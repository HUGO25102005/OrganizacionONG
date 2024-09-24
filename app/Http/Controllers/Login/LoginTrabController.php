<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginTrabRequest;
use App\Models\usuarios\Admin;
use Illuminate\Http\Request;

class LoginTrabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('Login.app_login_trabajador');
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
    public function store(StoreLoginTrabRequest $request)
    {

        // dd($request);
        // datos obtenidos del request
        $credentials = $request->only('correo', 'password');
        // verificacion
        $admin = Admin::where('Correo_Electronico', $credentials['correo'])
            ->where('Password', $credentials['password'])
            ->first();

        if ($admin && $admin->Rol =='Administrador') {

            session([
                'id' => $admin->ID_Usuario,
                'nombre' => $admin->Nombre_Completo,
                'correo' => $credentials['correo'],
                'rol' => $admin->Rol,
            ]);

            return to_route('admin.index');
        } else {
            return back()->withErrors([
                'login' => 'credenciales son incorrectas'
            ]);
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
