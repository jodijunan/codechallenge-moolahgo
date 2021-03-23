<?php 
namespace App\Http\Middleware;

use Illuminate\Http\Response;

class CorsMiddleware {

  public function handle($request, \Closure $next)
  {
    if ($request->isMethod('OPTIONS')) {
      $response = new Response("", 200);
    } else {
      $response = $next($request);
    }

    $response->header('Access-Control-Allow-Methods', 'HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS');
    $response->header('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'));
    $response->header('Access-Control-Allow-Origin', '*');

    return $response;
  }

}