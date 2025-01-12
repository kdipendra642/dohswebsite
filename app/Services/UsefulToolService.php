<?php

namespace App\Services;

use App\Repositories\Interfaces\UsefulToolRepositoryInterface;

class UsefulToolService
{
    protected $usefulToolRepository;

    public function __construct(
        UsefulToolRepositoryInterface $usefulToolRepository,
    ) {
        $this->usefulToolRepository = $usefulToolRepository;
    }

    /**
     * List All Staff
     */
    public function getAllUsefulTools(): object
    {
        return $this->usefulToolRepository->fetchAll(
            with: [
                'media',
            ]
        );
    }

    /**
     * Store Staff
     */
    public function storeUsefulTools(array $data): void
    {
        $UsefulTools = $this->usefulToolRepository->store($data);

        if (isset($data['icons'])) {
            $UsefulTools->addMedia($data['icons'])->toMediaCollection('icons');
        }
    }

    /**
     * Get By Id
     */
    public function getUsefulToolsById(string|int $usefulToolsId): object
    {
        return $this->usefulToolRepository->fetch(
            id: $usefulToolsId,
            with: [
                'media',
            ]
        );
    }

    /**
     * Update Staff
     */
    public function updateUsefulTools(string|int $usefulToolsId, array $data): object
    {
        $UsefulTools = $this->usefulToolRepository->update(
            data: $data,
            id: $usefulToolsId
        );

        if (isset($data['icons'])) {
            $UsefulTools->clearMediaCollection('UsefulTools');
            $UsefulTools->addMedia($data['icons'])->toMediaCollection('icons');
        }

        return $UsefulTools;
    }

    /**
     * Delete A Staff
     */
    public function deleteUsefulToolsData(string|int $usefulToolsId): void
    {
        $UsefulTools = $this->usefulToolRepository->fetch(
            id: $usefulToolsId,
            with: [
                'media',
            ]
        );

        if ($UsefulTools->icons) {
            $UsefulTools->clearMediaCollection('icons');
        }

        $this->usefulToolRepository->delete(
            id: $usefulToolsId
        );
    }
}
