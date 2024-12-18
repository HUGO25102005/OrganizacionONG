<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuarios\AdminRequest;
use App\Models\User;
use App\Models\Usuarios\Trabajadores\Administrador;
use App\Models\Usuarios\Trabajadores\Trabajador;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function store(AdminRequest $request)
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
            'estado' => 3,  // Estado solicitado por defecto
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
        ]);

        // Creación del administrador vinculado al trabajador
        $admin = Administrador::create([
            'id_trabajador' => $trabajador->id,  // Relación con el trabajador recién creado
        ]);


        return redirect()->route('admin.usuarios')->with('success', 'Administrador creado correctamente. Puedes revisarlo en la sección Usuarios > Solicitudes > Rol > Administrador.');
    }

    public function desactivar(Request $request)
    {
        // Obtener el ID del trabajador del request
        $id = $request->id;

        // Encontrar el trabajador por su ID
        $trabajador = Trabajador::find($id);

        if ($trabajador) {
            // Actualizar el estado del trabajador, asumiendo que el campo se llama 'activo'
            $trabajador->update(['estado' => 2]);

            // Redirigir de vuelta con un mensaje de éxito
            return redirect()->route('admin.usuarios')->with('warning', 'Trabajador DESACTIVADO correctamente. Puedes encontrarlo en Usuarios > Estado > Deshabilitado');
        }

        // Si no se encuentra el trabajador, redirigir con un mensaje de error
        return redirect()->route('admin.usuarios')->with('error', 'Trabajador no encontrado.');
    }


}
