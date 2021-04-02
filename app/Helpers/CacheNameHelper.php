<?php

namespace App\Helpers;

class CacheNameHelper
{
    static function getCurrentSite(): string
    {
        return 'user-'.\Auth::user()->id.'-site-current';
    }

    static function getHeaderNavigationSites(): string
    {
        return 'user-'.\Auth::user()->id.'-header-navigation-sites';
    }
}