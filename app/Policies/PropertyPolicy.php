<?php

namespace App\Policies;

use App\Models\User;

class PropertyPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct() {}
    public function store(User $user)
    {
        return $user->role_id == 2;
    }
}
