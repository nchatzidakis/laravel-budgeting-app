<?php

namespace App\View\Components;

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
            'header' => [
                'navigation' => [
                    'sites' => \Cache::remember('header-navigation-sites', 7200, function () {
                        return Site::all();
                    }),
                ],
            ],
        ];

        return view('layouts.app', $with);
    }
}
