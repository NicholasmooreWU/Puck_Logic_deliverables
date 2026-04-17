<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Team;

class TeamPolicy
{
    /**
     * Determine if the user can create a team.
     */
    public function create(User $user)
    {
        // Only allow commissioners or coaches
        return in_array($user->role, ['commissioner', 'coach']);
    }

    /**
     * Determine if the user can update the team.
     */
    public function update(User $user, Team $team)
    {
        // Only allow commissioners or coaches
        return in_array($user->role, ['commissioner', 'coach']);
    }

    /**
     * Determine if the user can delete the team.
     */
    public function delete(User $user, Team $team)
    {
        // Only allow commissioners or coaches
        return in_array($user->role, ['commissioner', 'coach']);
    }
}
