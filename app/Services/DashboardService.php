<?php

namespace App\Services;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\StaffRepositoryInterface;

class DashboardService
{
    protected $categoryRepository;

    protected $staffRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        StaffRepositoryInterface $staffRepository,
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->staffRepository = $staffRepository;
    }

    public function dashboardData(): array
    {
        $categories = $this->categoryRepository->fetchAll();
        $staffs = $this->staffRepository->fetchAll();

        return [
            'categories' => $categories,
            'staffs' => $staffs,
        ];
    }
}
