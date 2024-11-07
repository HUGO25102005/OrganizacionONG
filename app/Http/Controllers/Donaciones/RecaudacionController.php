<?php

namespace App\Http\Controllers\Donaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Donaciones\RecaudacionRequest;
use App\Models\Donaciones\Convocatoria;
use App\Models\Donaciones\Recaudacion;
use App\Models\User;
use Illuminate\Http\Request;

class RecaudacionController extends Controller
{
    public function store(RecaudacionRequest $request)
    {
        $idPrograma = $request->id_programa;
        $seccion = 2;
        $userId = session('id');
        $userExists = User::where('id', $userId)->exists();
        if ($userExists) {

            $convocatoria = Convocatoria::where('id', $request->id_programa)->first();

            if ($convocatoria) {
                $recaudacion = Recaudacion::create([
                    'id_administrador' => $userId,
                    'id_convocatoria' => $idPrograma,
                    'cantidad' => $request->cantidad,
                    'comentarios' => $request->comentarios
                ]);
            }

            $totalDonadoConv = Recaudacion::getTotalDonadoPorConvocatoria($convocatoria->id);

            $faltanteDonar = $convocatoria->cantarticulos - $totalDonadoConv;

            if ($faltanteDonar < 0) {

                //* se finaliza la convocatoria si cumple con la meta
                Convocatoria::setEstatusFinalizar($convocatoria->id);

                return redirect()
                    ->route('admin.donaciones', compact(['seccion']))
                    ->with('success', 'La donación se ha registrado con éxito. ¡Gracias por tu apoyo!')
                    ->with('warning', "El programa " . $convocatoria->titulo . " ha logrado cumplir con la meta de artículos. ¡Enhorabuena!");
            } else {

                return redirect()
                    ->route('admin.donaciones', compact(['seccion']))
                    ->with('success', 'La donación se ha registrado con éxito. ¡Gracias por tu apoyo!');
            }
        }
    }
}
