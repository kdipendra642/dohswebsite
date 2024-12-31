<?php

namespace App\Services;

use App\Repositories\Interfaces\ImportantLinkRepositoryInterface;

class ImportantLinkService
{
    protected $importantLinkRepositoryInterface;

    public function __construct(
        ImportantLinkRepositoryInterface $importantLinkRepositoryInterface,
    ) {
        $this->importantLinkRepositoryInterface = $importantLinkRepositoryInterface;
    }

    /**
     * List All Slider
     */
    public function getAllImportantLink(): object
    {
        return $this->importantLinkRepositoryInterface->fetchAll();
    }

    /**
     * Store Slider
     */
    public function storeImportantLink(array $data): void
    {
        $this->importantLinkRepositoryInterface->store($data);
    }

    /**
     * Get By Id
     */
    public function getImportantLinkById(string|int $importantLinkId): object
    {
        return $this->importantLinkRepositoryInterface->fetch(
            id: $importantLinkId,
        );
    }

    /**
     * Update Slider
     */
    public function updateImportantLink(string|int $importantLinkId, array $data): object
    {
        return $this->importantLinkRepositoryInterface->update(
            data: $data,
            id: $importantLinkId
        );
    }

    /**
     * Delete A Slider
     */
    public function deleteImportantLinkData(string|int $importantLinkId): void
    {
        $this->importantLinkRepositoryInterface->delete(
            id: $importantLinkId
        );
    }
}
