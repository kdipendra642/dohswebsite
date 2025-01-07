<?php

namespace App\Services;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ContactMessageRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\StaffRepositoryInterface;

class DashboardService
{
    protected $categoryRepository;
    protected $staffRepository;
    protected $postRepository;
    protected $contactMessageRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        StaffRepositoryInterface $staffRepository,
        PostRepositoryInterface $postRepository,
        ContactMessageRepositoryInterface $contactMessageRepository,
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->staffRepository = $staffRepository;
        $this->postRepository = $postRepository;
        $this->contactMessageRepository = $contactMessageRepository;
    }

    public function dashboardData(): array
    {
        $categories = $this->categoryRepository->fetchAll();
        $posts = $this->postRepository->fetchAll();
        $staffs = $this->staffRepository->fetchAll();
        $contactMessages = $this->contactMessageRepository->fetchAll();

        return [
            'categories' => $categories,
            'staffs' => $staffs,
            'posts' => $posts,
            'contactMessages' => $contactMessages
        ];
    }
}
