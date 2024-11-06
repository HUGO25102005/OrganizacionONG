<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
<<<<<<< HEAD
    
=======
>>>>>>> 08762f89dda1e4f821e89fd993db7e4fea1d9b4f
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $trabajador = Auth::user()->trabajador;

<<<<<<< HEAD
            if ($trabajador &&
                Auth::user()->id == $trabajador->id_user &&
                $trabajador->estado == "1" &&
                $trabajador->administrador &&
                $trabajador->id == $trabajador->administrador->id_trabajador) {
                return $next($request);
            }             
        }
        return redirect()->route('login')->withErrors('No tienes permisos para acceder a esta sección');
=======
            if ($trabajador && // Verificamos que trabajador no sea null
                Auth::user()->id == $trabajador->id_user &&
                $trabajador->estado == "1" &&
                $trabajador->administrador && // Verificamos que administrador no sea null
                $trabajador->id == $trabajador->administrador->id_trabajador
            ) {
                return $next($request);
            }
        }

        // Redirigir o manejar el acceso denegado
        return redirect()->route('login')->withErrors('No tienes permisos para acceder a esta sección.');
>>>>>>> 08762f89dda1e4f821e89fd993db7e4fea1d9b4f
    }
}
