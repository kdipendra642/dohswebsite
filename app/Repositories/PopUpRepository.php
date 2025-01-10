<?php

namespace App\Repositories;

use App\Models\PopUp;
use App\Repositories\Interfaces\PopUpRepositoryInterface;

class PopUpRepository extends BaseRepository implements PopUpRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(PopUp::class);
    }
}
