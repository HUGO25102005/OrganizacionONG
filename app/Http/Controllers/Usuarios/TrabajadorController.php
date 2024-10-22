<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\Usuarios\Trabajadores\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function aceptarSolicitudTrabajador(Request $request){

        $idTrabajador = $request->id;

        $trabajador = Trabajador::find($idTrabajador);

        if ($trabajador) {
            // Actualizar el estado del trabajador, asumiendo que el campo se llama 'activo'
            $trabajador->update(['estado' => 1]);

            // Redirigir de vuelta con un mensaje de éxito
            return redirect()->route('admin.usuarios', )->with('status', 'Se ha aceptado la solicitud correctamente');
        }

        // Si no se encuentra el trabajador, redirigir con un mensaje de error
        return redirect()->route('admin.usuarios')->with('error', 'No se pudo aceptar la solicitud');
    }
}
