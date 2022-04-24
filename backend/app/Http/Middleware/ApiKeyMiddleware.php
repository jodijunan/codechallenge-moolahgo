<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Http\Middleware;

use Closure;

class ApiKeyMiddleware
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
        if ($request->header('x-api-key') != env('APP_KEY')) {
            $return['code'] = 1;
            $return['message'] = 'Unauthorized';
            $return['error_message'] = 'Error, API KEY or SECRET KEY Header not found';
            return response()->json($return, 401);
        }

        return $next($request);
    }
}
