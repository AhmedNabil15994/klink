<?php

namespace App\Http\Middleware;

use Closure;

class DynamicSvgImages
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
        $response =  $next($request);
        $response->header('Content-type', 'image/svg+xml');
        $response->header('Cache-Control', ' max-age=3773950020, public');

        return $response;
    }
}
