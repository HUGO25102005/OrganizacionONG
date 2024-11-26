<?php

namespace App\Http\Controllers\Dashboard\Beneficiario;

use App\Http\Controllers\Controller;
use App\Models\ProgramasEducativos\ProgramaEducativo;
use App\Models\ProgramasEducativos\SalonesClase;
use Illuminate\Http\Request;

class DashboardBeneficiarioController extends Controller
{
    // Propiedad para colores
    private $colores = [
        'orange' => [
            'border' => 'border-orange-400',
            'bg' => 'bg-orange-400',
            'hover' => 'hover:bg-orange-500',
            'text' => 'text-orange-700',
        ],
        'blue' => [
            'border' => 'border-blue-400',
            'bg' => 'bg-blue-400',
            'hover' => 'hover:bg-blue-500',
            'text' => 'text-blue-700',
        ],
        'green' => [
            'border' => 'border-green-400',
            'bg' => 'bg-green-400',
            'hover' => 'hover:bg-green-500',
            'text' => 'text-green-700',
        ],
        'red' => [
            'border' => 'border-red-400',
            'bg' => 'bg-red-400',
            'hover' => 'hover:bg-red-500',
            'text' => 'text-red-700',
        ],
    ];
    public function home()
    {

        session(['name' => auth()->user()->name, 'rol' => 'Beneficiario', 'id' => auth()->user()->id]);

        return view('Dashboard.Beneficiario.index');
    }
    public function misClases(Request $request)
    {
        if (empty($request->seccion)) {
            $seccion = $request->get('seccion', 1);
        } else {
            $seccion = $request->seccion;
        }

        if ($seccion == 1) {
            $idBeneficiario = auth()->user()->beneficiario->id;
            $clases = SalonesClase::where('id_beneficiarios', '=', $idBeneficiario)
                ->with('programaEducativo')
                ->get();
            return view('Dashboard.Beneficiario.mis_clases', [
                'seccion' => $seccion,
                'clases' => $clases,
                'colores' => $this->colores, // Acceso a la propiedad
            ]);
        } else {
            $beneficiarioId = auth()->user()->beneficiario->id;

            $inscripciones = SalonesClase::where('id_beneficiarios', $beneficiarioId)
                ->pluck('id_programa_educativo')
                ->toArray();

            $ofertaClases = ProgramaEducativo::whereNotIn('id', $inscripciones)->get();

            return view('Dashboard.Beneficiario.mis_clases', [
                'seccion' => $seccion,
                'ofertaClases' => $ofertaClases,
                'colores' => $this->colores, // Acceso a la propiedad
            ]);
        }
    }

    public function getDetallesClase(Request $request)
    {
        $idClase = $request->id_clase;

        $info = ProgramaEducativo::obtenerDetalles($idClase);
        // dd($info);
        return response()->json(['data' => json_encode($info)]);
    }

    public function inscribirmeClase(Request $request)
    {
        // Obtener el ID del beneficiario autenticado
        $idBen = auth()->user()->beneficiario->id;

        // Obtener el ID de la clase desde la solicitud
        $idClase = $request->id_clase;

        // Validar que ambos IDs sean válidos
        if (!$idBen || !$idClase) {
            return response()->json(['error' => 'Datos incompletos'], 400);
        }

        // Verificar si el beneficiario ya está inscrito en la clase
        $existeRegistro = SalonesClase::where('id_beneficiarios', $idBen)
            ->where('id_programa_educativo', $idClase)
            ->exists();

        if ($existeRegistro) {
            // Si ya está inscrito, devolver mensaje de error
            return response()->json(['message' => 'Ya estás inscrito en esta clase'], 200);
        }

        // Si no está inscrito, crear el registro
        $inscripcion = SalonesClase::create([
            'id_beneficiarios' => $idBen,
            'id_programa_educativo' => $idClase,
        ]);

        // Verificar si la inscripción fue exitosa
        if ($inscripcion) {
            return response()->json(['message' => 'Inscripción exitosa'], 201);
        } else {
            return response()->json(['error' => 'No se pudo realizar la inscripción'], 500);
        }
    }
}
