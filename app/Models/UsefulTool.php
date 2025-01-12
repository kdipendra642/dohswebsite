<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class UsefulTool extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'url',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('icons')
            ->useDisk('media')
            ->singleFile();
    }
}
