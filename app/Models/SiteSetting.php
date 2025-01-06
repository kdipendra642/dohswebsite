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
        'titleOne_nep',
        'titleTwo_nep',
        'titleThree_nep',
        'titleFour_nep',
        'description_nep',
        'address_nep',
        'metaKeywords_nep',
        'metaDescription_nep',
    ];
}
