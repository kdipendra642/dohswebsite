<?php

namespace App\Services;

use App\Repositories\Interfaces\StaffRepositoryInterface;

class StaffService
{
    protected $staffRepository;

    public function __construct(
        StaffRepositoryInterface $staffRepository,
    ) {
        $this->staffRepository = $staffRepository;
    }

    /**
     * List All Staff
     */
    public function getAllStaffs(): object
    {
        return $this->staffRepository->fetchAll(
            with: [
                'media',
            ]
        );
    }

    /**
     * Store Staff
     */
    public function storeStaffs(array $data): void
    {
        $staffs = $this->staffRepository->store($data);

        if (isset($data['image'])) {
            $staffs->addMedia($data['image'])->toMediaCollection('staffs');
        }
    }

    /**
     * Get By Id
     */
    public function getStaffsById(string|int $staffsId): object
    {
        return $this->staffRepository->fetch(
            id: $staffsId,
            with: [
                'media',
            ]
        );
    }

    /**
     * Update Staff
     */
    public function updateStaffs(string|int $staffsId, array $data): object
    {
        $staffs = $this->staffRepository->update(
            data: $data,
            id: $staffsId
        );

        if (isset($data['image'])) {
            $staffs->clearMediaCollection('staffs');
            $staffs->addMedia($data['image'])->toMediaCollection('staffs');
        }

        return $staffs;
    }

    /**
     * Delete A Staff
     */
    public function deleteStaffsData(string|int $staffsId): void
    {
        $staffs = $this->staffRepository->fetch(
            id: $staffsId,
            with: [
                'media',
            ]
        );

        if ($staffs->image) {
            $staffs->clearMediaCollection('staffs');
        }

        $this->staffRepository->delete(
            id: $staffsId
        );
    }
}
