<?php

namespace App\Repositories;

use App\Models\Gallery;
use App\Repositories\Interfaces\GalleryRepositoryInterface;

class GalleryRepository extends BaseRepository implements GalleryRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(Gallery::class);
    }
}
