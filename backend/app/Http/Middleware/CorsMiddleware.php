<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!$this->isCorsRequest($request)) {
            return $next($request);
        }

        if (!$this->isAllowed($request)) {
            return $this->forbiddenResponse();
        }

        if ($this->isPreflightRequest($request)) {
            return $this->handlePreflightRequest();
        }

        $response = $next($request);

        return $this->addCorsHeaders($response);
    }

    protected function isCorsRequest($request): bool
    {
        if (!$request->headers->has('Origin')) {
            return false;
        }

        return $request->headers->get('Origin') !== $request->getSchemeAndHttpHost();
    }

    protected function isAllowed($request): bool
    {
        if (strpos($this->allowedMethods(), $request->method()) === false) {
            return false;
        }

        if (strpos($this->allowedOrigins(), '*') !== false) {
            return true;
        }

        return strpos($this->allowedOrigins(), $request->header('Origin')) !== false;
    }

    protected function allowedMethods(): string
    {
        return env('CORS_ALLOW_METHODS', 'OPTIONS, GET, POST, PATCH, PUT, DELETE');
    }

    protected function allowedOrigins(): string
    {
        return env('CORS_ALLOW_ORIGINS', '*');
    }

    protected function forbiddenResponse()
    {
        return response('Forbidden (cors).', 403);
    }

    protected function isPreflightRequest($request): bool
    {
        return $request->getMethod() === 'OPTIONS';
    }

    protected function handlePreflightRequest()
    {
        return $this->addPreflightHeaders(response('Preflight OK', 200));
    }

    protected function addPreflightHeaders($response)
    {
        return $response
            ->header('Access-Control-Allow-Methods', $this->allowedMethods())
            ->header('Access-Control-Allow-Headers', $this->allowedHeaders())
            ->header('Access-Control-Allow-Origin', $this->allowedOrigins())
            ->header('Access-Control-Max-Age', $this->maxAge());
    }

    protected function allowedHeaders(): string
    {
        return env('CORS_ALLOW_HEADERS', 'Content-Type, Origin, Authorization');
    }

    protected function maxAge(): int
    {
        return env('CORS_MAX_AGE', 60 * 60 * 24);
    }

    protected function addCorsHeaders($response)
    {
        return $response->header('Access-Control-Allow-Origin', $this->allowedOrigins());
    }
}
