<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        App::setLocale(Session::get('locale', config('app.locale')));

        return $next($request);
    }
}
