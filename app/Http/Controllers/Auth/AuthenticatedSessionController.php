<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        if (Auth::check()) {
            // Redirigir a la ruta del dashboard si ya está autenticado
            return redirect()->route('admin.home'); // Cambia esto según tu lógica de redirección
        }
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {    

        //dd($request);
        if(Auth::check()){
            $user = Auth::user();
            //dd($user);
        } else {
            $request->authenticate();
            $request->session()->regenerate();
            // Obtener el usuario autenticado
            $user = Auth::user();
        }
        //dd($user);
        if ($user->trabajador && $user->trabajador->administrador) {
            return redirect()->intended(route('admin.home'))->with('success', 'Sesión iniciada correctamente');
        } elseif ($user->trabajador && $user->trabajador->coordinador) {
            return redirect()->intended(route('coordinador.home'))->with('success', 'Sesión iniciada correctamente');
        } elseif ($user->trabajador && $user->trabajador->voluntario) {
            return redirect()->intended(route('vol.home'))->with('success', 'Sesión iniciada correctamente');
        } else {
            return redirect()->intended(route('dashboard'));
        } 
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
