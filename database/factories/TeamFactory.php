<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    protected $model = Team::class;

    public function definition()
    {
        return [
            'name' => $this->faker->city() . ' ' . $this->faker->word(),
            'league_id' => null, // Set in seeder
        ];
    }
}
