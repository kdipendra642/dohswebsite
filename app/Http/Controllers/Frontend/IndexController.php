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
            'getHomePageData' => $getHomePageData
        ]));
    }

    public function contact()
    {
        $contactPageData = $this->frontendIndexService->getContactPageData();
        return view('frontend.contact', ([
            'contactPageData' => $contactPageData
        ]));
    }

    /**
     * Get Into Gallery Page 
     */
    public function gallery(string $slug)
    {
        $galleryPageData = $this->frontendIndexService->getGalleryPage(slug: $slug);
        return view('frontend.gallery', ([
            'galleryPageData' => $galleryPageData->first()
        ])) ;   
    }
}
