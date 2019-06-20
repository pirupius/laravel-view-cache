<?php

namespace PiruPius\LaravelViewCache;

use Cache;
use Closure;

/**
 * Middleware to always flush view cache in local/dev enviromment
 *
 * @category Middleware
 * @package  PiruPius\LaravelViewCache
 * @author   Rubangakene Pius <piruville@gmail.com>
 * @license  MIT
 * @link     https://github.com/pirupius/laravel-view-cache
 */
class FlushViewCache
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request //
     * @param \Closure                 $next    //
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (app()->environment() == 'local') {
            Cache::tags('views')->flush();
        }
        return $next($request);
    }
}
