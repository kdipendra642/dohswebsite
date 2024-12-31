<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Login Handler
     */
    public function login(array $data): bool
    {
        if (Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password'],
        ])) {
            // Auth::login();
            return true;
        } else {
            throw new \Exception('Invalid email or password.');
        }

        return false;

    }

    /**
     * Logout of system completely
     */
    public function logout()
    {
        Auth::logout();
    }
}
