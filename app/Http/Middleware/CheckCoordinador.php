<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckCoordinador
{

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $trabajador = Auth::user()->trabajador;

            if ($trabajador &&
                Auth::user()->id == $trabajador->id_user &&
                $trabajador->estado == "1" &&
                $trabajador->coordinador &&
                $trabajador->id == $trabajador->coordinador->id_trabajador) {
                return $next($request);
            }             
        }
        return redirect()->route('login')->withErrors('No tienes permisos para acceder a esta sección');
    }
}