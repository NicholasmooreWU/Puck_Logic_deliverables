<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Stat;

class StatPolicy
{
    /**
     * Only allow commissioners or coaches to create stats.
     */
    public function create(User $user)
    {
        return in_array($user->role, ['commissioner', 'coach']);
    }

    /**
     * Only allow commissioners or coaches to update stats.
     */
    public function update(User $user, Stat $stat)
    {
        return in_array($user->role, ['commissioner', 'coach']);
    }

    /**
     * Only allow commissioners or coaches to delete stats.
     */
    public function delete(User $user, Stat $stat)
    {
        return in_array($user->role, ['commissioner', 'coach']);
    }
}
