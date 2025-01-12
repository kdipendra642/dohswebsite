<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\VideoGallery;
use App\Repositories\Interfaces\VideoGalleryRepositoryInterface;

class VideoGalleryRepository extends BaseRepository implements VideoGalleryRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(VideoGallery::class);
    }
}
