<?php

namespace App\Http\Controllers\Donaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Donaciones\ConvocatoriaRequest;
use App\Models\Donaciones\Convocatoria;
use App\Models\Donaciones\ProductoSolicitado;
use App\Models\User;
use Illuminate\Http\Request;

class ConvocatoriaController extends Controller
{
    public function store(ConvocatoriaRequest $request)
    {
        // dd($request);

        $userId = session('id');
        $userExists = User::where('id', $userId)->exists();
        if ($userExists) {

            $prodExiste = ProductoSolicitado::where('nombre', $request->nombre)->first();
            if( !$prodExiste ){
                $producto = ProductoSolicitado::create([
                    'nombre' => $request->nombre,
                    'estado' => 1,
                    'descript' => $request->descript,
                ]);
            } else {
                $producto = $prodExiste;
            }

            $idProducto = $producto->id;

            // // dd($idProducto);
            $convocatoria = Convocatoria::create([
                'id_administrador' => $userId,
                'titulo' => $request->titulo,
                'id_producto' => $idProducto,
                'descripcion' => $request->descripcion,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
                'objetivo' => $request->objetivo,
                'comentarios' => $request->comentarios,
                'cantarticulos' => $request->cantarticulos,
                'estado' => 1,
            ]);

            $seccion = 2;
            return redirect()
                    ->route('admin.donaciones', compact(['seccion']))
                    ->with('success', 'Convocatoria creada exitosamente.');
        }
    }
}
