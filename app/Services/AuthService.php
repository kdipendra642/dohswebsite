<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    protected $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
    ) {
        $this->userRepository = $userRepository;
    }
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

    /**
     * Get My Profile
     */
    public function getMyProfile(): object
    {
        $userId = Auth::user()->id;
        return $this->userRepository->fetch(id: $userId);
    }

    /**
     * Update Password
     */
    public function updatePassword(array $data, string $userId): void
    {
        $this->userRepository->update(
            data: $data,
            id: $userId
        );
    }
}
