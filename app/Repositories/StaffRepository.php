<?php

namespace App\Repositories;

use App\Models\Staff;
use App\Repositories\Interfaces\StaffRepositoryInterface;

class StaffRepository extends BaseRepository implements StaffRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(Staff::class);
    }
}
