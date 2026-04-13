<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class BracketController extends Controller
{
    public function roundRobin()
    {
        $teams = Team::all();
        $schedule = $this->generateRoundRobin($teams);
        return view('brackets.roundrobin', compact('teams', 'schedule'));
    }

    private function generateRoundRobin($teams)
    {
        $teamNames = $teams->pluck('name')->toArray();
        $n = count($teamNames);
        if ($n < 2) return [];
        $rounds = $n - 1;
        $matches = [];
        for ($r = 0; $r < $rounds; $r++) {
            $round = [];
            for ($i = 0; $i < $n / 2; $i++) {
                $home = $teamNames[$i];
                $away = $teamNames[$n - 1 - $i];
                $round[] = [$home, $away];
            }
            $matches[] = $round;
            array_splice($teamNames, 1, 0, array_splice($teamNames, -1));
        }
        return $matches;
    }
}
