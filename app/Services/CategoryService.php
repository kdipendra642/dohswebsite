<?php

namespace App\Services;

use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * List All Staff
     */
    public function getAllCAtegory(): object
    {
        return $this->categoryRepository->fetchAll();
    }

    /**
     * Store Staff
     */
    public function storeCAtegory(array $data): void
    {
        $this->categoryRepository->store($data);
    }

    /**
     * Get By Id
     */
    public function getCAtegoryById(string|int $categoryId): object
    {
        return $this->categoryRepository->fetch(
            id: $categoryId,
        );
    }

    /**
     * Update Staff
     */
    public function updateCAtegory(string|int $categoryId, array $data): object
    {
        return $this->categoryRepository->update(
            data: $data,
            id: $categoryId
        );
    }

    /**
     * Delete A Staff
     */
    public function deleteCAtegoryData(string|int $categoryId): void
    {
        $this->categoryRepository->delete(
            id: $categoryId
        );
    }
}
