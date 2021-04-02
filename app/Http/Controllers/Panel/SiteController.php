<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('panel.site.index', [
            'sites' => Site::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('panel.site.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
        ]);
        $site = \Auth::user()->sites()->create(request()->all());
        \Cache::forget('header-navigation-sites');
        return redirect()->route('panel.sites.show', $site->uuid);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site): View
    {
        return view('panel.site.edit', [
            'site' => $site,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Site $site): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
        ]);
        $site->update(request()->all());
        \Cache::forget('header-navigation-sites');
        return redirect()->route('panel.sites.show', $site->uuid);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site): RedirectResponse
    {
        $site->delete();
        \Cache::forget('header-navigation-sites');
        return redirect()->route('panel.sites.index');
    }
}
