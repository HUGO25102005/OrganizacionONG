<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuarios\StoreVoluntarioRequest;
use App\Models\User;
use App\Models\Usuarios\Trabajadores\Administrador;
use App\Models\Usuarios\Trabajadores\Trabajador;
use App\Models\Usuarios\Trabajadores\Voluntario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VoluntarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Simular que los datos provienen del modelo User autenticado
        session(['name' => auth()->user()->name, 'rol' => auth()->user()->Rol]);

        return view('Dashboard.Voluntario.index');
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
    public function store(StoreVoluntarioRequest $request)
    {
        // dd($request);
        $user = User::create([
            'name' => $request->name,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
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
            'hora_inicio' => '00:00',
            'hora_fin' => '00:00',
        ]);

        // Creación del administrador vinculado al trabajador
        $voluntario = Voluntario::create([
            'id_trabajador' => $trabajador->id,  // Relación con el trabajador recién creado
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_termino' => $request->fecha_termino,
            'hrs_dedicadas_semana'  => $request->hrs_dedicadas_semana,
            'comentarios' => $request->comentarios,
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
