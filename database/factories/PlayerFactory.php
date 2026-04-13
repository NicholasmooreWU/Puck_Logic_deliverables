<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    protected $model = Player::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'goals' => $this->faker->numberBetween(0, 50),
            'assists' => $this->faker->numberBetween(0, 50),
            'points' => $this->faker->numberBetween(0, 100),
            'penalty_minutes' => $this->faker->numberBetween(0, 60),
            'plus_minus' => $this->faker->numberBetween(-20, 20),
            'team_id' => null, // Set in seeder
        ];
    }
}
