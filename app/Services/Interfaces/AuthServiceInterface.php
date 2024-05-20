<?php

namespace App\Services\Interfaces;

interface AuthServiceInterface {
    public function login(string $email, string $password): void;

    public function logout(): void;
}
