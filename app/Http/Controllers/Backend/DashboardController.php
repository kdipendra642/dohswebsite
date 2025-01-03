<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BaseController;
use App\Services\DashboardService;

class DashboardController extends BaseController
{
    protected $dashboardService;

    public function __construct(
        DashboardService $dashboardService
    ) {
        $this->dashboardService = $dashboardService;
    }

    public function index()
    {
        $dashboardData = $this->dashboardService->dashboardData();

        return view('backend.index', ([
            'dashboardData' => $dashboardData,
        ]));
    }

    public function settingMenu()
    {
        return view('backend.menu.index');
    }
}
