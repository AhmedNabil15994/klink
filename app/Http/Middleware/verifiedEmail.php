<?php

namespace App\Http\Middleware;

use Closure;

class verifiedEmail
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
        if (!auth()->user()->email_verified_at) {
            if (request()->wantsJson()) {
                abort(401, 'verify email address');
            }
            return redirect('/login');
        }
        return $next($request);
    }
}
