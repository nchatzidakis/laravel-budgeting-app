<?php

namespace App\Http\Middleware;

use App\Helpers\CacheNameHelper;
use Closure;

class SetSiteAfterLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::user() !== null && session(CacheNameHelper::getCurrentSite()) === null) {
            $site = \Auth::user()->sites->sortByDesc('updated_at')->first();
            session([CacheNameHelper::getCurrentSite() => $site->id]);
        }
        return $next($request);
    }
}