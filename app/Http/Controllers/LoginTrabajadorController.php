<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginTrabajadorController extends Controller
{
    //

    function index()
    {
        return view('Login.app_login_trabajador');
    }

    // Método para autenticar las credenciales
    public function authenticate(Request $request)
    {
        // Validar las credenciales de entrada
        $credentials = $request->validate([
            'correo' => ['required', 'email'], // Valida que sea un correo
            'password' => ['required'],
        ]);

        // Intentar autenticar al trabajador
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Regenerar la sesión para evitar ataques de fijación de sesión
            $request->session()->regenerate();

            // Redirigir al dashboard u otra ruta segura
            return redirect()->intended('dashboard');
        }

        // Si la autenticación falla, redirigir de vuelta al formulario de login con un error
        return back()->withErrors([
            'correo' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }
}
