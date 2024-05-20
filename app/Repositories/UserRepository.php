<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {
    public function getUserByEmail(string $email): User {
        return User::whereEmail($email)->firstOrFail();
    }
}
