<?php

namespace App\Http\Middleware;

use App\Models\Usuarios\Trabajadores\Administrador;
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
        // Verifica si el usuario está autenticado
        if (Auth::check()) {
            // Obtiene el usuario autenticado
            $user = Auth::user();

            // Verifica si el usuario tiene un administrador asociado
            $admin = Administrador::where('id_trabajador', $user->trabajador->id)->first();

            if (!$admin) {
                // Si no existe un administrador, redirige a donde desees
                return redirect()->route('unauthorized')->with('error', 'Acceso denegado. No tienes permisos de administrador.');
            }

            // Si existe, continúa con la solicitud
            return $next($request);
        }

        // Redirige si no está autenticado
        return redirect()->route('login');

    }
}
