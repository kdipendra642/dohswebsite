<?php

namespace App\Services;

use App\Repositories\Interfaces\GalleryRepositoryInterface;
use App\Repositories\Interfaces\ImportantLinkRepositoryInterface;
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

    public function __construct(
        TickerRepositoryInterface $tickerRepository,
        SliderRepositoryInterface $sliderRepository,
        SiteSettingRepositoryInterface $siteSettingRepository,
        StaffRepositoryInterface $staffRepository,
        ImportantLinkRepositoryInterface $importantLinksRepository,
        GalleryRepositoryInterface $galleryRepository,

    ) {
        $this->tickerRepository = $tickerRepository;
        $this->sliderRepository = $sliderRepository;
        $this->siteSettingRepository = $siteSettingRepository;
        $this->staffRepository = $staffRepository;
        $this->importantLinksRepository = $importantLinksRepository;
        $this->galleryRepository = $galleryRepository;
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

}
