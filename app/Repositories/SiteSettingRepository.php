<?php

namespace App\Repositories;

use App\Models\SiteSetting;
use App\Repositories\Interfaces\SiteSettingRepositoryInterface;

class SiteSettingRepository extends BaseRepository implements SiteSettingRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(SiteSetting::class);
    }
}
