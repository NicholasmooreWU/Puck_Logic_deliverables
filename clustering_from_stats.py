import sqlite3
import pandas as pd
from sklearn.cluster import KMeans
import json
import os

# Path to your SQLite database
DB_PATH = os.path.join(os.path.dirname(__file__), 'database', 'database.sqlite')

# Connect to the database
conn = sqlite3.connect(DB_PATH)

# Read stats and player info
stats_df = pd.read_sql_query('SELECT * FROM stats', conn)
players_df = pd.read_sql_query('SELECT id, name FROM players', conn)


# Aggregate all available stats per player (sum)
agg = stats_df.groupby('player_id').agg({
    'goals': 'sum',
    'assists': 'sum',
    'shots': 'sum',
    'hits': 'sum',
    'pim': 'sum',
    'toi': 'sum',
    'saves': 'sum',
    'points': 'sum',
    'penalty_minutes': 'sum',
    'plus_minus': 'sum',
}).reset_index()

# Merge with player names
agg = agg.merge(players_df, left_on='player_id', right_on='id', how='left')





# Prepare features for clustering (exclude mostly-zero columns like 'saves')
import numpy as np
feature_cols = ['goals', 'assists', 'shots', 'hits', 'pim', 'toi', 'points', 'penalty_minutes', 'plus_minus']
features = agg[feature_cols].copy()

# Log-transform TOI before normalization
if 'toi' in features.columns:
    features['toi'] = np.log1p(features['toi'])  # log(TOI + 1)

# Fill NaN
features = features.fillna(0)

# Drop columns with zero variance
zero_var_cols = features.columns[features.std(ddof=0) == 0].tolist()
if zero_var_cols:
    print(f"Dropping columns with zero variance: {zero_var_cols}")
    features = features.drop(columns=zero_var_cols)

print(f"Columns used for clustering: {features.columns.tolist()}")

# Print a sample of the features before normalization
print("Sample of features before normalization (TOI is log-transformed):")
print(features.head(10))



# Standardize features (z-score normalization)
features_norm = (features - features.mean()) / features.std(ddof=0)

# Print a sample of the normalized features
print("Sample of normalized features:")
print(features_norm.head(10))




# Try different cluster counts
for n_clusters in [2, 3, 4, 5]:
    print(f"\n--- KMeans with n_clusters={n_clusters} ---")
    kmeans = KMeans(n_clusters=n_clusters, random_state=42)
    cluster_assignments = kmeans.fit_predict(features_norm)
    unique, counts = np.unique(cluster_assignments, return_counts=True)
    print("Cluster assignments and counts:", dict(zip(unique, counts)))
    print("Cluster centers:")
    for idx, center in enumerate(kmeans.cluster_centers_):
        print(f"Cluster {idx}: {dict(zip(feature_cols, center))}")

# Use n_clusters=3 for output as before
kmeans = KMeans(n_clusters=3, random_state=42)
agg['archetype'] = kmeans.fit_predict(features_norm)

# Debug: Print unique cluster assignments and counts
print("Unique cluster assignments and counts:")
print(agg['archetype'].value_counts())


# Analyze cluster centers and assign labels
cluster_centers = kmeans.cluster_centers_
print("Cluster centers (standardized stats):")
for idx, center in enumerate(cluster_centers):
    print(f"Cluster {idx}: {dict(zip(feature_cols, center))}")


# Assign labels directly by cluster index for clarity


# Debug: Print archetype assignments before mapping
print("Sample of agg['archetype']:", agg['archetype'].head(10))
print("Sample of agg[['name', 'archetype']]:\n", agg[['name', 'archetype']].head(10))
print("agg['archetype'] unique values:", agg['archetype'].unique())

# Robust label mapping: handle NaN and type errors
labels = ["Sniper", "Playmaker", "Enforcer"]  # Cluster 0, 1, 2
label_map = {int(i): label for i, label in enumerate(labels)}
def safe_label_map(x):
    try:
        return label_map[int(x)]
    except (KeyError, ValueError, TypeError):
        return "Unknown"
agg['archetype_label'] = agg['archetype'].apply(safe_label_map)

# Debug: Print unique archetype_label values
print("Unique archetype_label values found:", agg['archetype_label'].unique())

# Print cluster counts for debugging
print("Cluster counts:")
print(agg['archetype_label'].value_counts())


# Prepare results for Laravel
results = []
label_map = {i: label for i, label in enumerate(labels)}
for _, row in agg.iterrows():
    # Always assign archetype_label from the cluster index
    archetype_idx = int(row['archetype'])
    archetype_label = label_map.get(archetype_idx, str(archetype_idx))
    results.append({
        'player': row['name'],
        'archetype': archetype_idx,
        'archetype_label': archetype_label,
        'metrics': {col: int(row[col]) for col in feature_cols}
    })



# Write to clustering_results.json in storage/app (NOT public)
app_dir = os.path.join(os.path.dirname(__file__), 'storage', 'app')
os.makedirs(app_dir, exist_ok=True)
out_path = os.path.join(app_dir, 'clustering_results.json')
with open(out_path, 'w', encoding='utf-8') as f:
    json.dump(results, f, indent=2)


# Generate and save a bar chart of archetype label counts
import matplotlib.pyplot as plt
archetype_label_counts = agg['archetype_label'].value_counts()[labels]
plt.figure(figsize=(6,4))
archetype_label_counts.plot(kind='bar', color='skyblue')
plt.xlabel('Archetype')
plt.ylabel('Number of Players')
plt.title('Player Archetype Counts')
plt.tight_layout()
public_dir = os.path.join(os.path.dirname(__file__), 'storage', 'app', 'public')
os.makedirs(public_dir, exist_ok=True)
chart_path = os.path.join(public_dir, 'clustering_archetype_counts.png')
plt.savefig(chart_path)
plt.close()

print(f"Wrote {len(results)} clustering results to {out_path}")
print(f"Saved archetype count bar chart to {chart_path}")
