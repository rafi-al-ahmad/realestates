<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function setUserLangCookie($locale)
    {
        if (in_array($locale, config('app.supported_locales'))) {
            $cookie = cookie('accept-language', $locale, 2628000);
        }
        return back()->cookie($cookie);
    }
}
