import sys
import os
import json

if __name__ == "__main__":
    import argparse
    parser = argparse.ArgumentParser()
    parser.add_argument('--input', type=str, help='Path to players JSON file')
    args = parser.parse_args()

    if args.input and os.path.exists(args.input):
        with open(args.input, 'r', encoding='utf-8') as f:
            players = json.load(f)
        # Simple clustering: assign archetype by total points (low, mid, high)
        results = []
        for p in players:
            pts = p.get('points', 0)
            if pts >= 60:
                archetype = 2  # High
            elif pts >= 30:
                archetype = 1  # Mid
            else:
                archetype = 0  # Low
            results.append({
                "player": p.get("name", p.get("player_id", "")),
                "archetype": archetype,
                "metrics": {
                    "goals": p.get("goals", 0),
                    "assists": p.get("assists", 0),
                    "points": pts,
                    "penalty_minutes": p.get("penalty_minutes", 0),
                    "plus_minus": p.get("plus_minus", 0)
                }
            })
        out_dir = os.path.join(os.path.dirname(__file__), "storage", "app")
        os.makedirs(out_dir, exist_ok=True)
        out_path = os.path.join(out_dir, "clustering_results.json")
        with open(out_path, "w", encoding="utf-8") as f:
            json.dump(results, f, indent=2)
        print(f"Wrote {len(results)} clustering results to {out_path}")
    else:
        print("No input JSON file provided or file does not exist.")
from fastapi import FastAPI, Request
from pydantic import BaseModel
from typing import List, Dict
import pandas as pd
from sklearn.cluster import KMeans
from nhlpy import NHLClient

app = FastAPI()

class PlayerStats(BaseModel):
    player_id: int
    goals: int
    assists: int
    points: int
    penalty_minutes: int
    plus_minus: int

@app.post("/cluster")
def cluster_players(players: List[PlayerStats]):
    # Convert input to DataFrame
    df = pd.DataFrame([p.dict() for p in players])
    features = df.drop(columns=["player_id"])
    normalized = (features - features.min()) / (features.max() - features.min())
    kmeans = KMeans(n_clusters=5, random_state=42)
    clusters = kmeans.fit_predict(normalized)
    assignments = dict(zip(df["player_id"], clusters))
    return {"assignments": assignments}

@app.get("/fetch-and-cluster")
def fetch_and_cluster():
    # Fetch NHL player stats using nhlpy
    nhl = NHLClient()
    players = []
    # Get all teams
    teams = nhl.teams()
    for team in teams:
        team_id = team['id']
        # Get roster for each team
        roster = nhl.team_roster(team_id)
        for player in roster:
            player_id = player['person']['id']
            # Get player stats (current season)
            stats = nhl.player_stats(player_id)
            # stats is a list of dicts, get first element if available
            stat = stats[0]['splits'][0]['stat'] if stats and stats[0]['splits'] else {}
            players.append({
                "player_id": player_id,
                "goals": stat.get("goals", 0),
                "assists": stat.get("assists", 0),
                "points": stat.get("points", 0),
                "penalty_minutes": stat.get("penaltyMinutes", 0),
                "plus_minus": stat.get("plusMinus", 0)
            })
    df = pd.DataFrame(players)
    # Remove players with missing IDs
    df = df.dropna(subset=["player_id"])
    features = df.drop(columns=["player_id"])
    normalized = (features - features.min()) / (features.max() - features.min())
    kmeans = KMeans(n_clusters=5, random_state=42)
    clusters = kmeans.fit_predict(normalized)
    assignments = dict(zip(df["player_id"], clusters))
    return {"assignments": assignments, "count": len(assignments)}

# To run: uvicorn this_file_name:app --reload
