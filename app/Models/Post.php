<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model implements HasMedia
{
    use HasSlug;
    use InteractsWithMedia;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'sub_category',
        'show_on_ticker',
        'title_nep',
        'description_nep',
        'publised_at',
    ];

    protected $casts = [
        'show_on_ticker' => 'boolean',
    ];

    /**
     * Get BelongsTo relation with Category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('posts')
            ->useDisk('media')
            ->singleFile();
    }

    public function registerMediaCollectionsNep(): void
    {
        $this->addMediaCollection('posts_nep')
            ->useDisk('media')
            ->singleFile();
    }
}
