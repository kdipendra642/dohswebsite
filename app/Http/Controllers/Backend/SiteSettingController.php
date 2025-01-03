<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\SiteSettingRequest;
use App\Services\SiteSettingService;
use Illuminate\Support\Facades\DB;

class SiteSettingController extends BaseController
{
    protected $siteSettingService;

    public function __construct(
        SiteSettingService $siteSettingService
    ) {
        $this->siteSettingService = $siteSettingService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $sitesettings = $this->siteSettingService->getAllSiteSettings();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.sitesettings.create', [
            'sitesettings' => $sitesettings,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SiteSettingRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->siteSettingService->storeSiteSettings(
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('sitesettings.index')->with('success', 'SiteSetting updated successfully.');
    }
}
