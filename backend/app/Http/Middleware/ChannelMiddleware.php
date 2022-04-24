<?php

namespace App\Http\Middleware;

use Closure;

class ChannelMiddleware
{
    /**
     * Run the request filter.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $channel = null;
        if ($request->hasHeader('channel')) {
            $channel = strtolower($request->header('channel'));
        } elseif ($request->hasHeader('Channel')) {
            $channel = strtolower($request->header('Channel'));
        }

        $request->merge([
            'channel' => $channel,
        ]);

        return $next($request);
    }

}
