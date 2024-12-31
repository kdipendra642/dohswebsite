<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Base\BaseController;
use App\Services\FrontendIndexService;
use App\Services\SliderService;

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
}
