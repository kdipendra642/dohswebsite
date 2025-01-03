<?php

namespace App\Services;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\GalleryRepositoryInterface;
use App\Repositories\Interfaces\ImportantLinkRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\SiteSettingRepositoryInterface;
use App\Repositories\Interfaces\SliderRepositoryInterface;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use App\Repositories\Interfaces\TickerRepositoryInterface;

class FrontendIndexService
{
    protected $tickerRepository;
    protected $sliderRepository;
    protected $siteSettingRepository;
    protected $staffRepository;
    protected $importantLinksRepository;
    protected $galleryRepository;
    protected $categoryRepository;
    protected $postRepository;

    public function __construct(
        TickerRepositoryInterface $tickerRepository,
        SliderRepositoryInterface $sliderRepository,
        SiteSettingRepositoryInterface $siteSettingRepository,
        StaffRepositoryInterface $staffRepository,
        ImportantLinkRepositoryInterface $importantLinksRepository,
        GalleryRepositoryInterface $galleryRepository,
        CategoryRepositoryInterface $categoryRepository,
        PostRepositoryInterface $postRepository,

    ) {
        $this->tickerRepository = $tickerRepository;
        $this->sliderRepository = $sliderRepository;
        $this->siteSettingRepository = $siteSettingRepository;
        $this->staffRepository = $staffRepository;
        $this->importantLinksRepository = $importantLinksRepository;
        $this->galleryRepository = $galleryRepository;
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    public function getHomePageData(): array
    {
        $tickers = $this->tickerRepository->fetchAll();

        $sliders = $this->sliderRepository->fetchAll();

        $staffs = $this->staffRepository->fetchAll(
            filterable: [
                ['showOnHomePage', '=', 1],
            ],
            order: [
                'priority' => 'asc'
            ],
            limit: 2
        );

        $importantLinks = $this->importantLinksRepository->fetchAll(
            filterable: [
                ['showOnHomePage', '=', 1],
            ],
            limit: 12
        );

        $galleries = $this->galleryRepository->fetchAll(
            with: [
                'thumbnail',
                'supportingImages',
            ]
        );

        return [
            'tickers' => $tickers,
            'sliders' => $sliders,
            'staffs' => $staffs,
            'importantLinks' => $importantLinks,
            'galleries' => $galleries
        ];
    }

    /**
     * Get Data for contact page
     */
    public function getContactPageData(): array
    {
        $sitesettings = $this->siteSettingRepository->fetch(id: 1);

        return [
            'sitesettings' => $sitesettings
        ];
    }

    /**
     * Get Gallery Page Data
     */
    public function getGalleryPage(string $slug): object
    {
        return $this->galleryRepository->fetchAll(
            with: [
                'supportingImages'
            ],
            filterable: [
                ['slug', '=', $slug]
            ],
            limit: 1
        );
    }

    /**
     * Get All Categories
     */
    public function getAllCAtegory(): object
    {
        return $this->categoryRepository->fetchAll();
    }

    /**
     * Get All Gallery
     */
    public function getAllGalleryItems(): object
    {
        return $this->galleryRepository->fetchAll(
            order: [
                'created_at' => 'desc'
            ]
        );
    }

    /**
     * Get Category wise posts
     */
    public function getCategorywisePosts(string|int $categoryId): object
    {
        return $this->postRepository->fetchAll(
            with: [],
            filterable: [
                ['category_id', '=', $categoryId]
            ],
            order: [
                'created_at' => 'desc'
            ]
        );
    }

    /**
     * Get Post By Id
     */
    public function getPostById(string $slug): object
    {
        $post = $this->postRepository->fetchAll(
            filterable: [
                ['slug', '=', $slug]
            ],
            limit: 1
            );

        return $post->first();
        // return $this->postRepository->fetch(
        //     id: $postId
        // );
    }

}
