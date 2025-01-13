<?php

namespace App\Repositories;

use App\Models\Staff;
use App\Models\UsefulTool;
use App\Repositories\Interfaces\UsefulToolRepositoryInterface;

class UsefulToolRepository extends BaseRepository implements UsefulToolRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(UsefulTool::class);
    }
}
