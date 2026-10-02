<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\User;

class EloquentUserRepository implements UserRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function store(array $userData): User
    {
        return User::create($userData);
    }


}
