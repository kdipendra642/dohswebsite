<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('backend.index');
    }

    public function settingMenu()
    {
        
        return view('backend.menu.index');
    }
}
