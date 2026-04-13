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

# Aggregate stats per player (sum all stats for each player, including TOI)
agg = stats_df.groupby('player_id').agg({
    'goals': 'sum',
    'assists': 'sum',
    'shots': 'sum',
    'hits': 'sum',
    'pim': 'sum',
    'toi': 'sum',
}).reset_index()

# Merge with player names
agg = agg.merge(players_df, left_on='player_id', right_on='id', how='left')

# Prepare features for clustering (include TOI)

# Apply log transform to TOI for clustering
import numpy as np
features = agg[['goals', 'assists', 'shots', 'hits', 'pim', 'toi']].copy()
features['toi'] = np.log1p(features['toi'])  # log(TOI + 1)

# Normalize features
features_norm = (features - features.min()) / (features.max() - features.min())

# Run KMeans clustering
kmeans = KMeans(n_clusters=3, random_state=42)
agg['archetype'] = kmeans.fit_predict(features_norm)

# Prepare results for Laravel
results = []
for _, row in agg.iterrows():
    results.append({
        'player': row['name'],
        'archetype': int(row['archetype']),
        'metrics': {
            'goals': int(row['goals']),
            'assists': int(row['assists']),
            'shots': int(row['shots']),
            'hits': int(row['hits']),
            'pim': int(row['pim']),
            'toi': int(row['toi'])
        }
    })

# Write to clustering_results.json
out_dir = os.path.join(os.path.dirname(__file__), 'storage', 'app')
os.makedirs(out_dir, exist_ok=True)
out_path = os.path.join(out_dir, 'clustering_results.json')
with open(out_path, 'w', encoding='utf-8') as f:
    json.dump(results, f, indent=2)

print(f"Wrote {len(results)} clustering results to {out_path}")
