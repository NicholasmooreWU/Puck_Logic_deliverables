import unittest
import pandas as pd
from sklearn.cluster import KMeans

class TestClusteringLogic(unittest.TestCase):
    def setUp(self):
        # Example player stats data
        self.data = [
            {"player_id": 1, "goals": 12, "assists": 18, "points": 30, "penalty_minutes": 10, "plus_minus": 5},
            {"player_id": 2, "goals": 8, "assists": 22, "points": 30, "penalty_minutes": 6, "plus_minus": 3},
            {"player_id": 3, "goals": 20, "assists": 10, "points": 30, "penalty_minutes": 12, "plus_minus": 7},
            {"player_id": 4, "goals": 5, "assists": 15, "points": 20, "penalty_minutes": 8, "plus_minus": 2},
            {"player_id": 5, "goals": 15, "assists": 12, "points": 27, "penalty_minutes": 14, "plus_minus": 4}
        ]

    def test_kmeans_clustering(self):
        df = pd.DataFrame(self.data)
        features = df.drop(columns=["player_id"])
        normalized = (features - features.min()) / (features.max() - features.min())
        kmeans = KMeans(n_clusters=3, random_state=42)
        clusters = kmeans.fit_predict(normalized)
        self.assertEqual(len(clusters), len(self.data))
        self.assertEqual(len(set(clusters)), 3)

if __name__ == "__main__":
    unittest.main()
