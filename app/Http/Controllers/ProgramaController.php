<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ProgramasEducativos\ProgramaEducativo;
use App\Models\ProgramasEducativos\AprobacionContenido;
use App\Models\Caja\AprobacionPresupuesto;
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

    public function cancelarPrograma(Request $request)
    {
        $idPrograma = $request->id;
        $idCoordinador = auth()->user()->trabajador->coordinador->id;
        // Obtener el programa
        $programa = ProgramaEducativo::find($idPrograma);
    
        if ($programa) {
            // Crear o actualizar el registro en `aprobacion_contenidos` con `si_no = 0`
            AprobacionContenido::updateOrCreate(
                ['id_programa_educativo' => $idPrograma],
                [
                    'id_coordinador' => $idCoordinador,
                    'si_no' => 0, // Rechazar
                ]
            );
    
            // Actualizar el estado del programa directamente a 6
            $programa->update(['estado' => 6]);
    
            return redirect()->route('coordinador.programas', ['seccion' => 2])
                ->with('warning', 'El programa fue rechazado.');
        }
    
        return redirect()->route('coordinador.programas', ['seccion' => 2])
            ->with('error', 'No se encontró el programa.');
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

    public function aceptarPrograma(Request $request)
    {
        $idPrograma = $request->id;
        $idCoordinador = auth()->user()->trabajador->coordinador->id;
        
        // Obtener el programa junto con las relaciones necesarias
        $programa = ProgramaEducativo::with(['aprobacionPresupuestos'])->find($idPrograma);

        if ($programa) {
            // Verificar si el presupuesto está desaprobado (si_no = 0)
            $aprobacionPresupuesto = $programa->aprobacionPresupuestos;

            if ($aprobacionPresupuesto && $aprobacionPresupuesto->si_no == 0) {
                $programa->update(['estado' => 6]); // Cambiar estado a rechazado
                return redirect()->route('coordinador.programas', ['seccion' => 2])
                    ->with('warning', 'El programa fue rechazado debido a la desaprobación del presupuesto.');
            }

            // Crear o actualizar el registro en `aprobacion_contenidos` con `si_no = 1`
            AprobacionContenido::updateOrCreate(
                ['id_programa_educativo' => $idPrograma],
                [
                    'id_coordinador' => $idCoordinador,
                    'si_no' => 1, // Aceptar
                ]
            );

            // Verificar si el presupuesto está aprobado (si_no = 1)
            $nuevoEstado = ($aprobacionPresupuesto && $aprobacionPresupuesto->si_no == 1) ? 4 : 3;

            // Actualizar el estado del programa
            $programa->update(['estado' => $nuevoEstado]);

            return redirect()->route('coordinador.programas', ['seccion' => 2])
                ->with('success', 'El programa fue aceptado con éxito.');
        }

        return redirect()->route('coordinador.programas', ['seccion' => 2])
            ->with('error', 'No se encontró el programa.');
    }


    public function show($id){
        $programa = ProgramaEducativo::find($id);
        if (!$programa) {
            return redirect()->route('coordinador.programas')->with('error', 'Programa no encontrado.');
        }
        $programaData = $programa->registroActividades;
        return view('Dashboard.Coordinador.layouts.planeacion', compact('programa', 'programaData'));
    }
}