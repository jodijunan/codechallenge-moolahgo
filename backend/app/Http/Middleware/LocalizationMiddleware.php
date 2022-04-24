<?php

namespace App\Http\Middleware;

use Closure;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check header request and determine localizaton
        $lang = $request->hasHeader('X-localization') ? $request->Header('X-localization') : 'id';
        // set laravel localization
        app('translator')->setLocale($lang);
        return $next($request);
    }
}
