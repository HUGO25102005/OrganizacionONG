<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && 
            Auth::user()->id == Auth::user()->trabajador->id_user &&  
            Auth::user()->trabajador->estado == "1" && 
            Auth::user()->trabajador->id == Auth::user()->trabajador->administrador->id_trabajador) {
                // dd($request);
                return $next($request);
            }
            
        return redirect()->route('login');
    }
}
