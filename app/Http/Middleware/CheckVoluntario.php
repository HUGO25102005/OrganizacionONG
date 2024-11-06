<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckVoluntario
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $trabajador = Auth::user()->trabajador;

            if ($trabajador && // Verificamos que trabajador no sea null
                Auth::user()->id == $trabajador->id_user &&
                $trabajador->estado == "1" &&
                $trabajador->voluntario && // Verificamos que voluntario no sea null
                $trabajador->id == $trabajador->voluntario->id_trabajador
            ) {
                return $next($request);
            }
        }

        // Redirigir o manejar el acceso denegado
        return redirect()->route('login')->withErrors('No tienes permisos para acceder a esta sección.');
    }
}