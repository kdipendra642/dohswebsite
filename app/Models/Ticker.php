<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Ticker extends Model implements HasMedia
{
    use HasSlug;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'link',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('tickers')
            ->useDisk('media')
            ->singleFile();
    }
}
