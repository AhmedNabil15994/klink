<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Input;
use Redirect;
use Config;
use Lang;
class Language
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
        App::setLocale(Session::has('locale') ? Session::get('locale') : Config::get('app.locale'));

        return $next($request);
    }
}
