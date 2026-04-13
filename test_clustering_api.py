import requests
import json

# Example test data (replace with real player stats as needed)
data = [
    {"player_id": 1, "goals": 12, "assists": 18, "points": 30, "penalty_minutes": 10, "plus_minus": 5},
    {"player_id": 2, "goals": 8, "assists": 22, "points": 30, "penalty_minutes": 6, "plus_minus": 3},
    {"player_id": 3, "goals": 20, "assists": 10, "points": 30, "penalty_minutes": 12, "plus_minus": 7},
    {"player_id": 4, "goals": 5, "assists": 15, "points": 20, "penalty_minutes": 8, "plus_minus": 2},
    {"player_id": 5, "goals": 15, "assists": 12, "points": 27, "penalty_minutes": 14, "plus_minus": 4}
]

response = requests.post("http://127.0.0.1:8000/cluster", json=data)
print("/cluster endpoint response:", response.json())

# Test the /fetch-and-cluster endpoint (live NHL data)
fetch_response = requests.get("http://127.0.0.1:8000/fetch-and-cluster")
if fetch_response.status_code == 200:
    result = fetch_response.json()
    print("/fetch-and-cluster endpoint response:", result)
    assert "assignments" in result, "No assignments in response!"
    assert result["count"] > 0, "No players clustered!"
    print(f"Clustered {result['count']} players.")
else:
    print("/fetch-and-cluster endpoint failed:", fetch_response.status_code, fetch_response.text)
