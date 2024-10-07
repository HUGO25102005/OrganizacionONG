<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; // Asegúrate de importar la clase Auth
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Verifica si el usuario está autenticado y si tiene el rol adecuado
        if (Auth::check() && Auth::user()->Rol === $role) {
            return $next($request);
        }

        // Si no tiene el rol adecuado, redirige o muestra un error
        return redirect('/')->with('error', 'No tienes acceso a esta página.');
    }
}
