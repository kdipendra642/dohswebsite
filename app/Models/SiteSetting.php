<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'titleOne',
        'titleTwo',
        'titleThree',
        'titleFour',
        'description',
        'address',
        'primaryContact',
        'secondaryContact',
        'primaryEmail',
        'secondaryEmail',
        'socialTwitterLink',
        'socialFacebookLink',
        'socialYoutubeLink',
        'imap',
        'metaKeywords',
        'metaDescription',
    ];
}
