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
        $path = 'clustering_results.json';
        if (\Storage::disk('local')->exists($path)) {
            $json = \Storage::disk('local')->get($path);
            $results = json_decode($json, true);
        }
        return view('analytics.clustering', compact('results'));
    }

    public function triggerClustering(Request $request)
    {
        // Only trigger clustering if explicitly requested
        // (You can add your clustering trigger logic here if needed)
        \Log::info('[CLUSTERING DEBUG] Clustering trigger requested.');
        return redirect()->route('analytics.clustering')->with('status', 'Clustering trigger requested.');
    }
}
