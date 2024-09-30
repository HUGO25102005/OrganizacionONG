<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Verifica si el usuario está autenticado y si tiene el rol adecuado
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Si no tiene el rol adecuado, redirige o muestra un error
        return redirect('/')->with('error', 'No tienes acceso a esta página.');
    }
}
