<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuarios\AdminRequest;
use App\Models\User;
use App\Models\Usuarios\Trabajadores\Administrador;
use App\Models\Usuarios\Trabajadores\Trabajador;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(AdminRequest $request): RedirectResponse
    {

        // Creación del usuario
        $user = User::create([
            'name' => $request->name,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'pais' => $request->pais,
            'estado' => $request->estado,
            'municipio' => $request->municipio,
            'cp' => $request->cp,
            'direccion' => $request->direccion,
            'genero' => $request->genero,
            'telefono' => $request->telefono,
        ]);

        // Creación del trabajador vinculado a este usuario
        $trabajador = Trabajador::create([
            'id_user' => $user->id,  // Relación con el usuario recién creado
            'estado' => 1,  // Estado activo por defecto
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
        ]);

        // Creación del administrador vinculado al trabajador
        $admin = Administrador::create([
            'id_trabajador' => $trabajador->id,  // Relación con el trabajador recién creado
        ]);

        // Disparar el evento de registro
        event(new Registered($user));

        // Iniciar sesión como el nuevo administrador
        Auth::login($user);

        // Redirigir a la página del dashboard de administrador
        return redirect(route('admin.home'));
    }
}
