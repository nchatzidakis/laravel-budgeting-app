<?php

namespace App\View\Components;

use App\Helpers\CacheNameHelper;
use App\Models\Site;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $with = [
            'header_navigation' => [
                'sites' => \Cache::remember(CacheNameHelper::getHeaderNavigationSites(), 7200, function () {
                    return Site::all();
                }),
            ],
        ];

        return view('layouts.app', $with);
    }
}
