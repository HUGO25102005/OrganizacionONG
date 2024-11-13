<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuarios\StoreCoordinadorRequest;
use App\Http\Requests\Usuarios\CoordinadorRequest;
use App\Models\User;
use App\Models\Usuarios\Trabajadores\Coordinador;
use App\Models\Usuarios\Trabajadores\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CoordinadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Simular que los datos provienen del modelo User autenticado
        session(['name' => auth()->user()->name, 'rol' => auth()->user()->Rol]);

        return view('Dashboard.Coordinador.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(CoordinadorRequest $request)
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
        $admin = Coordinador::create([
            'id_trabajador' => $trabajador->id,  // Relación con el trabajador recién creado
        ]);

        return redirect()->route('admin.usuarios')->with('success', 'Coordinador creado exitosamente. Puedes revisarlo en la sección Usuarios > Solicitudes > Rol > Coordinador.');
    }

    public function store1(StoreCoordinadorRequest $request)
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
        $coordinador = Coordinador::create([
            'id_trabajador' => $trabajador->id,  // Relación con el trabajador recién creado
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
