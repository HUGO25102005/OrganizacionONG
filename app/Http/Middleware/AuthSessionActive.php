<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthSessionActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(auth()->check()){
            $user = auth()->user();
            if ($user->trabajador) {
                
                if ($user->trabajador->administrador) {
                    return redirect()->route('admin.home');
                } elseif ($user->trabajador->coordinador) {
                    return redirect()->route('coordinador.home');
                } elseif ($user->trabajador->voluntario) {
                    return redirect()->route('vol.home');
                }
            }
        }
        return $next($request);
    }
}