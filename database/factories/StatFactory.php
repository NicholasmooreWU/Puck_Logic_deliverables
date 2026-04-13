<?php

namespace Database\Factories;

use App\Models\Stat;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatFactory extends Factory
{
    protected $model = Stat::class;

    public function definition()
    {
        return [
            'goals' => $this->faker->numberBetween(0, 5),
            'assists' => $this->faker->numberBetween(0, 5),
            'shots' => $this->faker->numberBetween(0, 10),
            'hits' => $this->faker->numberBetween(0, 5),
            'pim' => $this->faker->numberBetween(0, 10),
            // TOI: realistic range for a hockey game (in seconds, e.g. 600-1800 = 10-30 min)
            'toi' => $this->faker->numberBetween(600, 1800),
        ];
    }
}
