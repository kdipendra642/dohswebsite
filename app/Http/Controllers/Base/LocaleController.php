<?php

namespace App\Http\Controllers\Base;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends BaseController
{
    public function setLocale(string $lang)
    {
        if (in_array($lang, ['en', 'nep'])) {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }

        return back();
    }
}
