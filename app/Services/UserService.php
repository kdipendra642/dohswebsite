<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * List All User
     */
    public function getAllUsers(): object
    {
        return $this->userRepository->fetchAll();
    }

    /**
     * Store User
     */
    public function storeUsers(array $data): void
    {
        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ];
        $this->userRepository->store($userData);
    }

    /**
     * Get By Id
     */
    public function getUserById(string|int $userId): object
    {
        return $this->userRepository->fetch(
            id: $userId
        );
    }

    /**
     * Update User
     */
    public function updateUser(string|int $userId, array $data): object
    {
        return $this->userRepository->update(
            data: $data,
            id: $userId
        );
    }

    /**
     * Delete A User
     */
    public function deleteUserData(string|int $userId): void
    {
        throw_if(
            $userId == Auth::user()->id,
            ValidationException::withMessages(['error' => 'You cannot perform this action on yourself.'])
        );

        $this->userRepository->delete(
            id: $userId
        );
    }
}
