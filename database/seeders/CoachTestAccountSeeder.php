<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CoachTestAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [ 'email' => 'coach@pucklogic.com' ],
            [
                'name' => 'Coach Test',
                'email' => 'coach@pucklogic.com',
                'password' => Hash::make('password'),
                'is_play_account' => false,
                'is_coach' => true,
            ]
        );
    }
}
