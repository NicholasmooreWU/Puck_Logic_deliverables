<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\League;
use App\Models\Team;
use App\Models\Player;

class SampleSeeder extends Seeder
{
    public function run()
    {
        // Create 2 commissioners
        $commissioners = User::factory()->count(2)->create();

        // For each commissioner, create 2 leagues
        $commissioners->each(function ($commissioner) {
            $leagues = League::factory()->count(2)->create([
                'commissioner_id' => $commissioner->id,
            ]);
            // For each league, create 3 teams
            $leagues->each(function ($league) {
                $teams = Team::factory()->count(3)->create([
                    'league_id' => $league->id,
                ]);
                // For each team, create 10 players
                $teams->each(function ($team) {
                    Player::factory()->count(10)->create([
                        'team_id' => $team->id,
                    ]);
                });
            });
        });
    }
}
