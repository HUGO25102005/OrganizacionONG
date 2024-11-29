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
        'peach' => [
            'border' => 'border-rose-200',
            'bg' => 'bg-rose-200',
            'hover' => 'hover:bg-rose-300',
            'text' => 'text-rose-700',
        ],
        'sky' => [
            'border' => 'border-sky-200',
            'bg' => 'bg-sky-200',
            'hover' => 'hover:bg-sky-300',
            'text' => 'text-sky-700',
        ],
        'mint' => [
            'border' => 'border-green-200',
            'bg' => 'bg-green-200',
            'hover' => 'hover:bg-green-300',
            'text' => 'text-green-700',
        ],
        'lavender' => [
            'border' => 'border-purple-200',
            'bg' => 'bg-purple-200',
            'hover' => 'hover:bg-purple-300',
            'text' => 'text-purple-700',
        ],
        'butter' => [
            'border' => 'border-yellow-200',
            'bg' => 'bg-yellow-200',
            'hover' => 'hover:bg-yellow-300',
            'text' => 'text-yellow-700',
        ],
        'aqua' => [
            'border' => 'border-teal-200',
            'bg' => 'bg-teal-200',
            'hover' => 'hover:bg-teal-300',
            'text' => 'text-teal-700',
        ],
        'coral' => [
            'border' => 'border-orange-200',
            'bg' => 'bg-orange-200',
            'hover' => 'hover:bg-orange-300',
            'text' => 'text-orange-700',
        ],
        'blush' => [
            'border' => 'border-pink-200',
            'bg' => 'bg-pink-200',
            'hover' => 'hover:bg-pink-300',
            'text' => 'text-pink-700',
        ],
        'ice' => [
            'border' => 'border-cyan-200',
            'bg' => 'bg-cyan-200',
            'hover' => 'hover:bg-cyan-300',
            'text' => 'text-cyan-700',
        ],
        'cream' => [
            'border' => 'border-amber-200',
            'bg' => 'bg-amber-200',
            'hover' => 'hover:bg-amber-300',
            'text' => 'text-amber-700',
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
