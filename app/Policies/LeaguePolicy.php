<?php

namespace App\Policies;

use App\Models\User;
use App\Models\League;

class LeaguePolicy
{
    /**
     * Determine if the user can create a league.
     */
    public function create(User $user)
    {
        // Only allow commissioners
        return $user->role === 'commissioner';
    }

    /**
     * Determine if the user can update the league.
     */
    public function update(User $user, League $league)
    {
        // Only allow commissioners
        return $user->role === 'commissioner';
    }

    /**
     * Determine if the user can delete the league.
     */
    public function delete(User $user, League $league)
    {
        // Only allow commissioners
        return $user->role === 'commissioner';
    }
}
