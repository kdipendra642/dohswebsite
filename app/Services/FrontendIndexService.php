<?php

namespace App\Services;

use App\Enums\PostSubCategoryTypeEnum;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\GalleryRepositoryInterface;
use App\Repositories\Interfaces\ImportantLinkRepositoryInterface;
use App\Repositories\Interfaces\PopUpRepositoryInterface;
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

    protected $popupsRepository;

    public function __construct(
        TickerRepositoryInterface $tickerRepository,
        SliderRepositoryInterface $sliderRepository,
        SiteSettingRepositoryInterface $siteSettingRepository,
        StaffRepositoryInterface $staffRepository,
        ImportantLinkRepositoryInterface $importantLinksRepository,
        GalleryRepositoryInterface $galleryRepository,
        CategoryRepositoryInterface $categoryRepository,
        PostRepositoryInterface $postRepository,
        PopUpRepositoryInterface $popupsRepository,

    ) {
        $this->tickerRepository = $tickerRepository;
        $this->sliderRepository = $sliderRepository;
        $this->siteSettingRepository = $siteSettingRepository;
        $this->staffRepository = $staffRepository;
        $this->importantLinksRepository = $importantLinksRepository;
        $this->galleryRepository = $galleryRepository;
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
        $this->popupsRepository = $popupsRepository;
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
                'priority' => 'asc',
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

        $lawRelatedNews = $this->postRepository->fetchAll(
            filterable: [
                ['sub_category', '=', PostSubCategoryTypeEnum::LAWS_REGULATION->value],
            ],
            order: [
                'created_at' => 'desc',
            ],
            limit: 5
        );

        $informationRelatedNews = $this->postRepository->fetchAll(
            filterable: [
                ['sub_category', '=', PostSubCategoryTypeEnum::INFORMATION_NEWS->value],
            ],
            order: [
                'created_at' => 'desc',
            ],
            limit: 5
        );

        $tenderRelatedNews = $this->postRepository->fetchAll(
            filterable: [
                ['sub_category', '=', PostSubCategoryTypeEnum::TENDER_NOTICE->value],
            ],
            order: [
                'created_at' => 'desc',
            ],
            limit: 5
        );

        $publicationRelatedNews = $this->postRepository->fetchAll(
            filterable: [
                ['sub_category', '=', PostSubCategoryTypeEnum::PUBLICATION->value],
            ],
            order: [
                'created_at' => 'desc',
            ],
            limit: 5
        );

        $pressReleaseRelatedNews = $this->postRepository->fetchAll(
            filterable: [
                ['sub_category', '=', PostSubCategoryTypeEnum::PRESS_RELEASE->value],
            ],
            order: [
                'created_at' => 'desc',
            ],
            limit: 5
        );

        $otherNews = $this->postRepository->fetchAll(
            filterable: [
                ['sub_category', '=', PostSubCategoryTypeEnum::OTHER->value],
            ],
            order: [
                'created_at' => 'desc',
            ],
            limit: 5
        );

        $popUps = $this->popupsRepository->fetchAll(
            filterable: [
                ['status', '=', 1],
            ],
            order: [
                'created_at' => 'desc',
            ],
            limit: 5
        );

        return [
            'tickers' => $tickers,
            'sliders' => $sliders,
            'staffs' => $staffs,
            'importantLinks' => $importantLinks,
            'galleries' => $galleries,
            'lawRelatedNews' => $lawRelatedNews,
            'informationRelatedNews' => $informationRelatedNews,
            'tenderRelatedNews' => $tenderRelatedNews,
            'publicationRelatedNews' => $publicationRelatedNews,
            'pressReleaseRelatedNews' => $pressReleaseRelatedNews,
            'otherNews' => $otherNews,
            'popUps' => $popUps,
        ];
    }

    /**
     * Get Data for contact page
     */
    public function getContactPageData(): array
    {
        $sitesettings = $this->siteSettingRepository->fetch(id: 1);
        $currentLocale = session('locale', app()->getLocale());

        return [
            'sitesettings' => $sitesettings,
            'currentLocale' => $currentLocale,
        ];
    }

    /**
     * Get Gallery Page Data
     */
    public function getGalleryPage(string $slug): object
    {
        return $this->galleryRepository->fetchAll(
            with: [
                'supportingImages',
            ],
            filterable: [
                ['slug', '=', $slug],
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
                'created_at' => 'desc',
            ]
        );
    }

    /**
     * Get Category wise posts
     */
    public function getCategorywisePosts(string|int $categoryId): object
    {
        return $this->postRepository->fetchAll(
            with: [
                'category',
            ],
            filterable: [
                ['category_id', '=', $categoryId],
            ],
            order: [
                'created_at' => 'desc',
            ]
        );
    }

    /**
     * Get Sub Category wise post
     */
    public function getSubCategorywisePosts(string $subcategory): object
    {
        return $this->postRepository->fetchAll(
            with: [
                'category',
            ],
            filterable: [
                ['sub_category', '=', $subcategory],
            ],
            order: [
                'created_at' => 'desc',
            ]
        );
    }

    /**
     * Get Post By Id
     */
    public function getPostBySlug(string $slug): object
    {
        $post = $this->postRepository->fetchAll(
            filterable: [
                ['slug', '=', $slug],
            ],
            limit: 1
        );

        return $post->first();
        // return $this->postRepository->fetch(
        //     id: $postId
        // );
    }

    /**
     * Get All Staffs
     */
    public function getAllStaffs(): object
    {
        return $this->staffRepository->fetchAll(
            order: [
                'priority' => 'asc',
            ]
        );
    }

    /**
     * Get Single STaaff
     */
    public function getSingleStaffById(string|int $staffId): object
    {
        return $this->staffRepository->fetch(
            id: $staffId
        );
    }

    /**
     * Get Ticker By Slug
     */
    public function getTickerBySlug(string $slug): object
    {
        $tickers = $this->tickerRepository->fetchAll(
            filterable: [
                ['slug', '=', $slug],
            ],
            limit: 1
        );

        return $tickers->first();
    }

    /**
     * Get All PopUp to list at home page
     */
    public function getAllPopUps(): object
    {
        return $this->popupsRepository->fetchAll(
            filterable: [
                ['status', '=', 1],
            ],
            with: [
                'media',
            ],
            order: [
                'created_at' => 'desc',
            ]
        );
    }

    public function getPopUpById(string $slug): object
    {
        $popUp = $this->popupsRepository->fetchAll(
            filterable: [
                ['slug', '=', $slug],
            ],
            limit: 1
        );

        return $popUp->first();
    }
}
