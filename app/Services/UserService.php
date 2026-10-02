<?php

namespace App\Services;

use App\Contracts\UserRepositoryInterface;

class UserService
{
    /**
     * Create a new class instance.
     */

    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $userData)
    {
        $userData['role'] = 'user';

        $userData['status'] = true;
        
        return $this->repository->store($userData);
    }
}
