<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
/* use App\Models\User; */
use App\Models\ProgramasEducativos\ProgramaEducativo;
use Illuminate\Http\Request;
/* use Illuminate\Support\Facades\Hash; */


class ProgramaController extends Controller
{
    

    public function desactivarPrograma(Request $request){

        $idPrograma = $request->id;

        $programa = ProgramaEducativo::find($idPrograma);

        if ($programa) {
            // Actualizar el estado del trabajador, asumiendo que el campo se llama 'activo'
            $programa->update(['estado' => 2]);

            // Redirigir de vuelta con un mensaje de éxito
            return redirect()->route('coordinador.programas', )->with('warning', 'Programa desactivado con éxito.');
        }

        // Si no se encuentra el trabajador, redirigir con un mensaje de error
        return redirect()->route('coordinador.programas')->with('error', 'Ocurrió un error al desactivar el programa.');
    }

    public function cancelarPrograma(Request $request){

        $idPrograma = $request->id;

        $programa = ProgramaEducativo::find($idPrograma);

        if ($programa) {
            // Actualizar el estado del trabajador, asumiendo que el campo se llama 'activo'
            $programa->update(['estado' => 6]);

            // Redirigir de vuelta con un mensaje de éxito
            return redirect()->route('coordinador.programas', ['seccion' => 2])->with('warning', 'Solicitud cancelada con éxito.');
        }

        // Si no se encuentra el trabajador, redirigir con un mensaje de error
        return redirect()->route('coordinador.programas', ['seccion' => 2])->with('error', 'Ocurrió un error al cancelar la solicitud.');
    }

    public function activarPrograma(Request $request){
        // Obtener el ID del trabajador del request
        $idPrograma = $request->id;

        // Encontrar el trabajador por su ID
        $programa = ProgramaEducativo::find($idPrograma);

        if ($programa) {
            // Actualizar el estado del trabajador, asumiendo que el campo se llama 'activo'
            $programa->update(['estado' => 4]);

            // Redirigir de vuelta con un mensaje de éxito
            return redirect()->route('coordinador.programas')->with('success', 'Programa activado con éxito.');
        }

        // Si no se encuentra el trabajador, redirigir con un mensaje de error
        return redirect()->route('coordinador.programas')->with('error', 'Ocurrió un error al activar el programa.');
    }
    public function aceptarPrograma(Request $request){
        // Obtener el ID del trabajador del request
        $idPrograma = $request->id;

        // Encontrar el trabajador por su ID
        $programa = ProgramaEducativo::find($idPrograma);

        if ($programa) {
            // Actualizar el estado del trabajador, asumiendo que el campo se llama 'activo'
            $programa->update(['estado' => 3]);

            // Redirigir de vuelta con un mensaje de éxito
            return redirect()->route('coordinador.programas', ['seccion' => 2])->with('success', 'Solicitud aceptada con éxito.');
        }

        // Si no se encuentra el trabajador, redirigir con un mensaje de error
        return redirect()->route('coordinador.programas', ['seccion' => 2])->with('error', 'Ocurrió un error al aceptar el programa.');
    }
}