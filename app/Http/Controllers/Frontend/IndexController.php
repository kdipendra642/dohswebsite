<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Base\BaseController;
use App\Services\FrontendIndexService;

class IndexController extends BaseController
{
    protected $frontendIndexService;

    public function __construct(
        FrontendIndexService $frontendIndexService
    ) {
        $this->frontendIndexService = $frontendIndexService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getHomePageData = $this->frontendIndexService->getHomePageData();

        return view('frontend.index', ([
            'getHomePageData' => $getHomePageData,
        ]));
    }

    public function contact()
    {
        $contactPageData = $this->frontendIndexService->getContactPageData();

        return view('frontend.contact', ([
            'contactPageData' => $contactPageData,
        ]));
    }

    /**
     * Get Into Gallery Page
     */
    public function gallery(string $slug)
    {
        $galleryPageData = $this->frontendIndexService->getGalleryPage(slug: $slug);

        return view('frontend.gallery.gallery', ([
            'galleryPageData' => $galleryPageData->first(),
        ]));
    }

    /**
     * Get All Categories
     */
    public function category()
    {
        $categories = $this->frontendIndexService->getAllCAtegory();

        return view('frontend.categories.index', ([
            'categories' => $categories,
        ]));
    }

    /**
     * Get all gallery listing
     */
    public function indexGallery()
    {
        $galleries = $this->frontendIndexService->getAllGalleryItems();

        return view('frontend.gallery.index', ([
            'galleries' => $galleries,
        ]));
    }

    /**
     * Get Categorywise posts
     */
    public function categorywisePost(string $categoryId)
    {
        $posts = $this->frontendIndexService->getCategorywisePosts(
            categoryId: $categoryId
        );

        return view('frontend.posts.index', ([
            'posts' => $posts,
        ]));
    }

    /**
     * Get Sub Category wise post
     */
    public function subcatewisePost(string $subcategory)
    {
        $posts = $this->frontendIndexService->getSubCategorywisePosts(
            subcategory: $subcategory
        );

        return view('frontend.posts.index', ([
            'posts' => $posts,
        ]));
    }

    /**
     * Get Single Posts
     */
    public function singlePost(string $slug)
    {
        $posts = $this->frontendIndexService->getPostBySlug(
            slug: $slug
        );

        return view('frontend.posts.show', ([
            'posts' => $posts,
        ]));
    }

    /**
     * Get All Staffs
     */
    public function indexStaffs()
    {
        $staffs = $this->frontendIndexService->getAllStaffs();

        return view('frontend.staffs.index', ([
            'staffs' => $staffs,
        ]));
    }

    /**
     * Get Single Staff
     */
    public function singleStaffs(string $staffId)
    {
        $staff = $this->frontendIndexService->getSingleStaffById(staffId: $staffId);

        return view('frontend.staffs.show', ([
            'staff' => $staff
        ]));
    }

    /**
     * Get Full view of ticker
     */
    public function tickers(string $slug)
    {
        $tickers = $this->frontendIndexService->getTickerBySlug(slug: $slug);
        return view('frontend.tickers.show', ([
            'tickers' => $tickers,
        ]));
    }

    /**
     * Get All Popups
     */
    public function popupsIndex()
    {
        $popups = $this->frontendIndexService->getAllPopUps();
        return view('frontend.popups.index', ([
            'popups' => $popups
        ]));
    }

    /**
     * Get Single Popup
     */
    public function popupSingle(string $slug)
    {
        $popups = $this->frontendIndexService->getPopUpById(slug: $slug);

        return view('frontend.popups.show', ([
            'popups' => $popups
        ]));
    }
}
