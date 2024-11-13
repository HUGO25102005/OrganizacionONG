<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuarios\StoreBeneficiarioRequest;
use App\Models\User;
use App\Models\Usuarios\Beneficiarios\Beneficiario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BeneficiarioController extends Controller
{
    
    public function store(StoreBeneficiarioRequest $request)
    {
        // Creación del usuario
        $user = User::create([
            'name' => $request->name,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'pais' => $request->pais,
            'estado' => $request->estado,
            'municipio' => $request->municipio,
            'cp' => $request->cp,
            'direccion' => $request->direccion,
            'genero' => $request->genero,
            'telefono' => $request->telefono,
        ]);

        // Creación del administrador vinculado al trabajador
        $beneficiario = Beneficiario::create([
            'id_user' => $user->id,  // Relación con el trabajador recién creado
            'estado' => 3,  // Estado solicitado por defecto
            'nivel_educativo' => $request->nivel_educativo,
            'ocupacion' => $request->ocupacion,
            'num_dependientes' => 0,
            'ingresos_mensuales' => $request->ingresos_mensuales
        ]);
    }

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