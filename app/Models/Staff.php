<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Staff extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'telephone',
        'email',
        'position',
        'division',
        'section',
        'description',
        'showOnHomePage',
    ];

    protected $casts = [
        'showOnHomePage' => 'boolean'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('staffs')
            ->useDisk('media')
            ->singleFile();
    }
}
