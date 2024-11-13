<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBeneficiario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $beneficiario = Auth::user()->beneficiario;

            if ($beneficiario && // Verificamos que beneficiario no sea null
                Auth::user()->id == $beneficiario->user->id &&
                $beneficiario->estado == "1"
            ) {
                return $next($request);
            }
        }

        // Redirigir o manejar el acceso denegado
        return redirect()->route('login')->withErrors('No tienes permisos para acceder a esta sección.');
    }
}
