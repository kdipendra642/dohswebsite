<?php

namespace App\Repositories;

use App\Models\Ticker;
use App\Repositories\Interfaces\TickerRepositoryInterface;

class TickerRepository extends BaseRepository implements TickerRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(Ticker::class);
    }
}
