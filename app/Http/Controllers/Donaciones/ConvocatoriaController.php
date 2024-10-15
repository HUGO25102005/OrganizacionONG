<?php

namespace App\Http\Controllers\Donaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Donaciones\ConvocatoriaRequest;
use App\Models\Donaciones\Convocatoria;
use App\Models\User;
use Illuminate\Http\Request;

class ConvocatoriaController extends Controller
{
    public function store(ConvocatoriaRequest $request)
    {
        //dd($request);

        $userId = session('id');
        $userExists = User::where('id', $userId)->exists();
        if( $userExists ){
            $convocatoria = Convocatoria::create([
                'id_administrador' => session('id'),
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
                'objetivo' => $request->objetivo,
                'comentarios' => $request->comentarios,
                'estado' => 1,
             ]);

             return redirect()->route('admin.donaciones')->with('success', 'Convocatoria creada exitosamente.');

        }
    
    }
}
