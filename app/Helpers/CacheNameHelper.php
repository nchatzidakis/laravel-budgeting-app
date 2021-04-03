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

    static function getCategories() : string {
        return 'user-'.\Auth::user()->id.'-categories';
    }

    static function getAccounts() : string {
        return 'user-'.\Auth::user()->id.'-accounts';
    }
}