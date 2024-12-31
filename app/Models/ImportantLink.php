<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportantLink extends Model
{
    protected $fillable = [
        'title',
        'url',
        'showOnHomePage',
    ];

    protected $casts = [
        'showOnHomePage' => 'boolean'
    ];
}
