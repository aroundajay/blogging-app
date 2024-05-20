<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\AuthServiceInterface;

use Illuminate\Support\Facades\Hash;

use Exception;

class AuthService implements AuthServiceInterface {

    public function __construct(private UserRepositoryInterface $userRepo) {}

    public function login(string $email, string $password): void {
        $user = $this->userRepo->getUserByEmail($email);

        if (!Hash::check($password, $user->password)) {
            throw new Exception('Incorrect password');
        }

        auth()->login($user);
    }

    public function logout(): void {
        if (!auth()->check()) {
            return;
        }

        auth()->logout();
    }
}
