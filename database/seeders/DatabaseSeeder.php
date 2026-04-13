<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\League;
use App\Models\Team;
use App\Models\Player;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create a known commissioner for login
        $commissioner = \App\Models\User::create([
            'name' => 'Commissioner',
            'email' => 'commissioner@pucklogic.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);

        // Create 1 more random commissioner
        $commissioners = collect([$commissioner])->merge(
            \App\Models\User::factory()->count(1)->create()
        );

        // For each commissioner, create 2 leagues
        $commissioners->each(function ($commissioner) {
            $leagues = \App\Models\League::factory()->count(2)->create([
                'commissioner_id' => $commissioner->id,
            ]);
            // For each league, create 3 teams
            $leagues->each(function ($league) {
                $teams = \App\Models\Team::factory()->count(3)->create([
                    'league_id' => $league->id,
                ]);
                // For each team, create 10 players with realistic stats
                $teams->each(function ($team) use ($league) {
                    $players = \App\Models\Player::factory()->count(10)->create([
                        'team_id' => $team->id,
                    ]);
                    $players->each(function ($player) {
                        // Assign realistic stats
                        $player->goals = rand(5, 40);
                        $player->assists = rand(5, 40);
                        $player->points = $player->goals + $player->assists;
                        $player->penalty_minutes = rand(0, 60);
                        $player->plus_minus = rand(-15, 20);
                        $player->save();
                    });
                });
                // For each league, create 5 games and stats for each player in each game
                $games = collect();
                for ($i = 0; $i < 5; $i++) {
                    $games->push(\App\Models\Game::create([
                        'league_id' => $league->id,
                        'home_team_id' => $teams->random()->id,
                        'away_team_id' => $teams->random()->id,
                        'date' => now()->addDays($i),
                        'venue' => 'Arena '.($i+1),
                        'status' => 'scheduled',
                    ]));
                }
                $teams->each(function ($team) use ($games) {
                    $players = $team->players;
                    foreach ($games as $game) {
                        foreach ($players as $player) {
                            \App\Models\Stat::factory()->create([
                                'player_id' => $player->id,
                                'game_id' => $game->id,
                            ]);
                        }
                    }
                });
            });
        });
    }
}
