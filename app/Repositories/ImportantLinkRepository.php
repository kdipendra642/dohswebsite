<?php

namespace App\Repositories;

use App\Models\ImportantLink;
use App\Repositories\Interfaces\ImportantLinkRepositoryInterface;

class ImportantLinkRepository extends BaseRepository implements ImportantLinkRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(ImportantLink::class);
    }
}
