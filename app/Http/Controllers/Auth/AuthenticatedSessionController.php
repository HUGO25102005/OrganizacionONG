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
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        // Obtener el rol del usuario autenticado
        $user = Auth::user();
        
        // Redirigir según el rol del usuario
        if ($user->Rol === 'Administrador') {
            return redirect()->intended(route('home.index'));
        } 
        // elseif ($user->Rol === 'coordinador') {
        //     return redirect()->intended(route('coordinador.index')); // Crear ruta coordinador.index
        // } 
        else {
            return redirect()->intended(route('dashboard')); // Usuario común
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
