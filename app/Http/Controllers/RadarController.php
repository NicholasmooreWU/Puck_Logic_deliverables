<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RadarController extends Controller
{
    public function show(Request $request)
    {
        $player = $request->input('player');
        $labels = ['Goals', 'Assists', 'Shots', 'Hits', 'PIM', 'TOI'];
        $metrics = null;
        $allPlayerMetrics = [];
        if (Storage::exists('clustering_results.json')) {
            $results = json_decode(Storage::get('clustering_results.json'), true);
            // Gather all player metrics for normalization
            foreach ($results as $row) {
                $allPlayerMetrics[] = array_values($row['metrics'] ?? []);
            }
            // Find selected player's metrics
            if ($player) {
                foreach ($results as $row) {
                    if (($row['player'] ?? '') === $player) {
                        $metrics = array_values($row['metrics'] ?? []);
                        break;
                    }
                }
            }
        }
        return view('analytics.radar', compact('player', 'labels', 'metrics', 'allPlayerMetrics'));
    }
}
