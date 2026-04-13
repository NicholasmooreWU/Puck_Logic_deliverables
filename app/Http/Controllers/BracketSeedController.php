<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class BracketSeedController extends Controller
{
    public function showSeeding()
    {
        $teams = Team::all()->sortByDesc('points'); // Assume points column exists
        $bracket = $this->generateBracket($teams);
        return view('brackets.seeding', compact('teams', 'bracket'));
    }

    private function generateBracket($teams)
    {
        $teamNames = $teams->pluck('name')->toArray();
        $bracket = [];
        $n = count($teamNames);
        for ($i = 0; $i < $n / 2; $i++) {
            $bracket[] = [$teamNames[$i], $teamNames[$n - 1 - $i]];
        }
        return $bracket;
    }
}
