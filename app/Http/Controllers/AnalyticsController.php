<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class AnalyticsController extends Controller
{

    public function showClustering()
    {
        // Always read clustering_results.json and log debug info
        $results = [];
        $debugMsg = '';
        if (Storage::exists('clustering_results.json')) {
            $json = Storage::get('clustering_results.json');
            $results = json_decode($json, true);
            $debugMsg = 'clustering_results.json found. Count: ' . (is_array($results) ? count($results) : 0);
        } else {
            $debugMsg = 'clustering_results.json not found.';
        }
        \Log::info('[CLUSTERING DEBUG] ' . $debugMsg);
        // Show debug message in UI for troubleshooting
        return view('analytics.clustering', compact('results'))->with('debug', $debugMsg);
    }

    public function triggerClustering(Request $request)
    {
        // Only trigger clustering if explicitly requested
        // (You can add your clustering trigger logic here if needed)
        \Log::info('[CLUSTERING DEBUG] Clustering trigger requested.');
        return redirect()->route('analytics.clustering')->with('status', 'Clustering trigger requested.');
    }
}
