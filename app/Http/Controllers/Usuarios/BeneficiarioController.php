<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\Usuarios\Beneficiarios\Beneficiario;
use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    public function aceptarSolicitudBeneficiario(Request $request){

        $idBeneficiario = $request->id;

        $beneficiario = Beneficiario::find($idBeneficiario);

        if ($beneficiario) {
            // Actualizar el estado del trabajador, asumiendo que el campo se llama 'activo'
            $beneficiario->update(['estado' => 1]);

            // Redirigir de vuelta con un mensaje de éxito
            return redirect()->route('coordinador.beneficiarios', )->with('success', 'Beneficiario activado con éxito.');
        }

        // Si no se encuentra el trabajador, redirigir con un mensaje de error
        return redirect()->route('coordinador.beneficiarios')->with('error', 'Ocurrió un error al activar el beneficiario.');
    }

    public function aceptarSolicitudBeneficiario2(Request $request){

        $idBeneficiario = $request->id;

        $beneficiario = Beneficiario::find($idBeneficiario);

        if ($beneficiario) {
            // Actualizar el estado del trabajador, asumiendo que el campo se llama 'activo'
            $beneficiario->update(['estado' => 1]);

            // Redirigir de vuelta con un mensaje de éxito
            return redirect()->route('coordinador.beneficiarios', ['seccion' => 2])->with('success', 'Solicitud aceptada con éxito.');
        }

        // Si no se encuentra el trabajador, redirigir con un mensaje de error
        return redirect()->route('coordinador.beneficiarios', ['seccion' => 2])->with('error', 'Ocurrió un error al aceptar el beneficiario.');
    }

    public function desactivarBeneficiario(Request $request){
        // Obtener el ID del trabajador del request
        $id = $request->id;

        // Encontrar el trabajador por su ID
        $beneficiario = Beneficiario::find($id);

        if ($beneficiario) {
            // Actualizar el estado del trabajador, asumiendo que el campo se llama 'activo'
            $beneficiario->update(['estado' => 2]);

            // Redirigir de vuelta con un mensaje de éxito
            return redirect()->route('coordinador.beneficiarios')->with('warning', 'Beneficiario desactivado con éxito.');
        }

        // Si no se encuentra el trabajador, redirigir con un mensaje de error
        return redirect()->route('coordinador.beneficiarios')->with('error', 'Ocurrió un error al desactivar el beneficiario.');
    }
    public function cancelarBeneficiario(Request $request){
        // Obtener el ID del trabajador del request
        $id = $request->id;

        // Encontrar el trabajador por su ID
        $beneficiario = Beneficiario::find($id);

        if ($beneficiario) {
            // Actualizar el estado del trabajador, asumiendo que el campo se llama 'activo'
            $beneficiario->update(['estado' => 4]);

            // Redirigir de vuelta con un mensaje de éxito
            return redirect()->route('coordinador.beneficiarios', ['seccion' => 2])->with('warning', 'Solicitud cancelada con éxito.');
        }

        // Si no se encuentra el trabajador, redirigir con un mensaje de error
        return redirect()->route('coordinador.beneficiarios', ['seccion' => 2])->with('error', 'Ocurrió un error al cancelar la solicitud.');
    }
}