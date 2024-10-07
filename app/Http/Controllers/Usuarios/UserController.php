<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\usuarios\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        // dd($request);
        try {

            if ($request->Rol == 'Administrador') {
                $request->validate([
                    'Rol' => 'required|string|max:255',
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|string|min:8',
                    'Fecha_Nacimiento' => 'required|date',
                    'Genero' => 'required|string|max:10',
                    'Telefono' => 'required|string|max:20',
                    'Pais' => 'required|string|max:255',
                    'Estado' => 'required|string|max:255',
                    'Municipio' => 'required|string|max:255',
                    'Direccion' => 'required|string|max:255',
                    'Referencias_Laborales' => 'nullable|string|max:255',
                    'Motivo_Sector_Educativo' => 'nullable|string|max:255',
                ], [
                    // Mensajes personalizados
                    'Rol.required' => 'El campo Rol es obligatorio.',
                    'name.required' => 'El campo Nombre es obligatorio.',
                    'email.required' => 'El campo Correo Electrónico es obligatorio.',
                    'email.email' => 'El formato del Correo Electrónico no es válido.',
                    'email.unique' => 'El Correo Electrónico ya está en uso.',
                    'password.required' => 'El campo Contraseña es obligatorio.',
                    'password.min' => 'La Contraseña debe tener al menos :min caracteres.',
                    'Fecha_Nacimiento.required' => 'El campo Fecha de Nacimiento es obligatorio.',
                    'Genero.required' => 'El campo Género es obligatorio.',
                    'Telefono.required' => 'El campo Teléfono es obligatorio.',
                    'Pais.required' => 'El campo País es obligatorio.',
                    'Estado.required' => 'El campo Estado es obligatorio.',
                    'Municipio.required' => 'El campo Municipio es obligatorio.',
                    'Direccion.required' => 'El campo Dirección es obligatorio.',
                ]);

                // Crear el nuevo usuario utilizando el modelo User
                $user = User::create([
                    'Rol' => $request->input('Rol'), // Añadir el rol si está en el modelo User
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')), // La contraseña se hashea aquí
                    'Fecha_Nacimiento' => $request->input('Fecha_Nacimiento'),
                    'Genero' => $request->input('Genero'),
                    'Telefono' => $request->input('Telefono'),
                    'Pais' => $request->input('Pais'),
                    'Estado' => $request->input('Estado'),
                    'Municipio' => $request->input('Municipio'),
                    'Direccion' => $request->input('Direccion'),
                    'Referencias_Laborales' => $request->input('Referencias_Laborales'),
                    'Motivo_Sector_Educativo' => $request->input('Motivo_Sector_Educativo'),
                ]);
            } else if ($request->Rol == 'Coordinador') {
                $request->validate([
                    'Rol' => 'required|string|max:255',
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|string|min:8',
                    'Fecha_Nacimiento' => 'required|date',
                    'Genero' => 'required|string|max:10',
                    'Telefono' => 'required|string|max:20',
                    'Pais' => 'required|string|max:255',
                    'Estado' => 'required|string|max:255',
                    'Municipio' => 'required|string|max:255',
                    'Direccion' => 'required|string|max:255',
                    //'Identificacion_Oficial' => 'required|string|max:255',
                    'Experiencia_Previa' => 'required|string|max:255',
                    'Habilidades_Conocimientos' => 'required|string|max:255',
                    //'Experiencia_Laboral' => 'required|string|max:255',
                    'Experiencia_Sector_Educativo' => 'required|string|max:255',
                    'Habilidades_Clave' => 'required|string|max:255',
                    'Idiomas' => 'required|string|max:255',
                    'Funcion_Clave' => 'required|string|max:255',
                    'Area_Supervision' => 'required|string|max:255',
                    //'Capacidad_Manejo_Equipos' => 'required|string|max:255',
                    'Conocimientos_Herramientas' => 'required|string|max:255',
                    //'Disponibilidad_Viajes' => 'required|string|max:255',
                    //'Compromiso_ONG' => 'required|string|max:255',
                    //'Referencias_Laborales' => 'required|string|max:255',
                    //'Motivo_Sector_Educativo' => 'required|string|max:255',
                    'Comentarios_Adicionales' => 'nullable|string|max:255',
                    //'Declaracion_Veracidad' => 'required|boolean', // O 'required|string|max:3' dependiendo de cómo lo manejes
                ], [
                    // Mensajes personalizados
                    'Rol.required' => 'El campo Rol es obligatorio.',
                    'name.required' => 'El campo Nombre es obligatorio.',
                    'email.required' => 'El campo Correo Electrónico es obligatorio.',
                    'email.email' => 'El formato del Correo Electrónico no es válido.',
                    'email.unique' => 'El Correo Electrónico ya está en uso.',
                    'password.required' => 'El campo Contraseña es obligatorio.',
                    'password.min' => 'La Contraseña debe tener al menos :min caracteres.',
                    'Fecha_Nacimiento.required' => 'El campo Fecha de Nacimiento es obligatorio.',
                    'Genero.required' => 'El campo Género es obligatorio.',
                    'Telefono.required' => 'El campo Teléfono es obligatorio.',
                    'Pais.required' => 'El campo País es obligatorio.',
                    'Estado.required' => 'El campo Estado es obligatorio.',
                    'Municipio.required' => 'El campo Municipio es obligatorio.',
                    'Direccion.required' => 'El campo Dirección es obligatorio.',
                    //'Identificacion_Oficial.required' => 'El campo Identificación Oficial es obligatorio.',
                    'Experiencia_Previa.required' => 'El campo Experiencia Previa es obligatorio.',
                    'Habilidades_Conocimientos.required' => 'El campo Habilidades y Conocimientos es obligatorio.',
                    //'Experiencia_Laboral.required' => 'El campo Experiencia Laboral es obligatorio.',
                    'Experiencia_Sector_Educativo.required' => 'El campo Experiencia en Sector Educativo es obligatorio.',
                    'Habilidades_Clave.required' => 'El campo Habilidades Clave es obligatorio.',
                    'Idiomas.required' => 'El campo Idiomas es obligatorio.',
                    'Funcion_Clave.required' => 'El campo Función Clave es obligatorio.',
                    'Area_Supervision.required' => 'El campo Área de Supervisión es obligatorio.',
                    //'Capacidad_Manejo_Equipos.required' => 'El campo Capacidad de Manejo de Equipos es obligatorio.',
                    'Conocimientos_Herramientas.required' => 'El campo Conocimientos de Herramientas es obligatorio.',
                    //'Disponibilidad_Viajes.required' => 'El campo Disponibilidad para Viajes es obligatorio.',
                    //'Compromiso_ONG.required' => 'El campo Compromiso con ONG es obligatorio.',
                    //'Referencias_Laborales.required' => 'El campo Referencias Laborales es obligatorio.',
                    //'Motivo_Sector_Educativo.required' => 'El campo Motivo en Sector Educativo es obligatorio.',
                    //'Declaracion_Veracidad.required' => 'El campo Declaración de Veracidad es obligatorio.',
                ]);

                // Crear el nuevo registro utilizando el modelo correspondiente
                $registro = User::create([
                    'Rol' => $request->input('Rol'), // Añadir el rol si está en el modelo User
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')), // La contraseña se hashea aquí
                    'Fecha_Nacimiento' => $request->input('Fecha_Nacimiento'),
                    'Genero' => $request->input('Genero'),
                    'Telefono' => $request->input('Telefono'),
                    'Pais' => $request->input('Pais'),
                    'Estado' => $request->input('Estado'),
                    'Municipio' => $request->input('Municipio'),
                    'Direccion' => $request->input('Direccion'),
                    'Identificacion_Oficial' => $request->input('Identificacion_Oficial'),
                    'Experiencia_Previa' => $request->input('Experiencia_Previa'),
                    'Habilidades_Conocimientos' => $request->input('Habilidades_Conocimientos'),
                    //'Experiencia_Laboral' => $request->input('Experiencia_Laboral'),
                    'Experiencia_Sector_Educativo' => $request->input('Experiencia_Sector_Educativo'),
                    'Habilidades_Clave' => $request->input('Habilidades_Clave'),
                    'Idiomas' => $request->input('Idiomas'),
                    'Funcion_Clave' => $request->input('Funcion_Clave'),
                    'Area_Supervision' => $request->input('Area_Supervision'),
                    //'Capacidad_Manejo_Equipos' => $request->input('Capacidad_Manejo_Equipos'),
                    'Conocimientos_Herramientas' => $request->input('Conocimientos_Herramientas'),
                    //'Disponibilidad_Viajes' => $request->input('Disponibilidad_Viajes'),
                    //'Compromiso_ONG' => $request->input('Compromiso_ONG'),
                    //'Referencias_Laborales' => $request->input('Referencias_Laborales'),
                    'Motivo_Sector_Educativo' => $request->input('Motivo_Sector_Educativo'),
                    'Comentarios_Adicionales' => $request->input('Comentarios_Adicionales'),
                    //'Declaracion_Veracidad' => $request->input('Declaracion_Veracidad'),
                ]);
            } else if($request->Rol == 'Voluntario'){
                $request->validate([
                    'Rol' => 'required|string|max:255',
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|string|min:8',
                    'Fecha_Nacimiento' => 'required|date',
                    'Genero' => 'required|string|max:10',
                    'Telefono' => 'required|string|max:20',
                    'Pais' => 'required|string|max:255',
                    'Estado' => 'required|string|max:255',
                    'Municipio' => 'required|string|max:255',
                    'Direccion' => 'required|string|max:255',
                    'Referencias_Laborales' => 'nullable|string|max:255',
                    'Motivo_Sector_Educativo' => 'nullable|string|max:255',
                ], [
                    // Mensajes personalizados
                    'Rol.required' => 'El campo Rol es obligatorio.',
                    'name.required' => 'El campo Nombre es obligatorio.',
                    'email.required' => 'El campo Correo Electrónico es obligatorio.',
                    'email.email' => 'El formato del Correo Electrónico no es válido.',
                    'email.unique' => 'El Correo Electrónico ya está en uso.',
                    'password.required' => 'El campo Contraseña es obligatorio.',
                    'password.min' => 'La Contraseña debe tener al menos :min caracteres.',
                    'Fecha_Nacimiento.required' => 'El campo Fecha de Nacimiento es obligatorio.',
                    'Genero.required' => 'El campo Género es obligatorio.',
                    'Telefono.required' => 'El campo Teléfono es obligatorio.',
                    'Pais.required' => 'El campo País es obligatorio.',
                    'Estado.required' => 'El campo Estado es obligatorio.',
                    'Municipio.required' => 'El campo Municipio es obligatorio.',
                    'Direccion.required' => 'El campo Dirección es obligatorio.',
                ]);

                // Crear el nuevo usuario utilizando el modelo User
                $user = User::create([
                    'Rol' => $request->input('Rol'), // Añadir el rol si está en el modelo User
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')), // La contraseña se hashea aquí
                    'Fecha_Nacimiento' => $request->input('Fecha_Nacimiento'),
                    'Genero' => $request->input('Genero'),
                    'Telefono' => $request->input('Telefono'),
                    'Pais' => $request->input('Pais'),
                    'Estado' => $request->input('Estado'),
                    'Municipio' => $request->input('Municipio'),
                    'Direccion' => $request->input('Direccion'),
                    'Referencias_Laborales' => $request->input('Referencias_Laborales'),
                    'Motivo_Sector_Educativo' => $request->input('Motivo_Sector_Educativo'),
                ]);
            }

            // Redirigir a donde necesites
            return redirect()->route('admin.usuarios')->with('success', 'Usuario creado exitosamente.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ocurrió un error: ' . $e->getMessage()])->withInput();
        }
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
