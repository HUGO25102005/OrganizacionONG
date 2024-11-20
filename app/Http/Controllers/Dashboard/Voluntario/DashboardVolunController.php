<?php

namespace App\Http\Controllers\Dashboard\Voluntario;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Programa\ProgramaController;
use App\Http\Requests\Programa\ActividadesRequest;
use App\Http\Requests\Programa\ProgramaRequest;
use App\Models\Caja\Presupuesto;
use App\Models\ProgramasEducativos\ProgramaEducativo;
use App\Models\Registros\RegistroActividades;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class DashboardVolunController extends Controller
{
    public function home()
    {

        session(['name' => auth()->user()->name, 'rol' => 'Voluntario', 'id' => auth()->user()->id]);

        return view('Dashboard.Voluntario.index');
    }
    public function misClases(Request $request)
    {
        if (empty($request->seccion)) {
            $seccion = $request->get('seccion', 1);
        } else {
            $seccion = $request->seccion;
        }

        session(['name' => auth()->user()->name, 'rol' => 'Valuntario', 'id' => auth()->user()->id]);

        return view('Dashboard.Voluntario.mis_clases', compact(['seccion']));
    }
    public function nuevaClase(Request $request)
    {
        if (empty($request->seccion)) {
            $seccion = $request->get('seccion', 1);
        } else {
            $seccion = $request->seccion;
        }

        return view('Dashboard.Voluntario.nueva_clase', compact(['seccion']));
    }

    public function storeProgramaEducativo(ProgramaRequest $request)
    {

        $id_voluntario = Auth()->user()->trabajador->voluntario->id;

        $duracion = ProgramaEducativo::getDuracion($request->fecha_inicio, $request->fecha_termino);

        // dd($duracion);
        $presupuesto = Presupuesto::create([
            'monto' => $request->monto_presupuesto, // Asignación del monto de presupuesto
            'porque' => $request->motivo_presupuesto, // Asignación del motivo de presupuesto
        ]);

        $programa = ProgramaEducativo::create([
            'id_voluntario' => $request->id_voluntario,
            'nombre_programa' => $request->nombre_programa,
            'descripcion' => $request->descripcion,
            'objetivos' => $request->objetivos,
            'publico_objetivo' => $request->publico_objetivo,
            'duracion' => $duracion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_termino' => $request->fecha_termino,
            'recursos_necesarios' => $request->recursos_necesarios,
            'estado' => 1,
            'resultados_esperados' => $request->resultados_esperados,
            'id_presupuesto' => $presupuesto->id,
            'beneficiarios_estimados' => $request->beneficiarios_estimados,
            'indicadores_cumplimiento' => $request->indicadores_cumplimiento,
            'comentarios_adicionales' => $request->comentarios_adicionales,
        ]);
        $seccion = 1;

        if ($programa) {
            $id_programa = $programa->id;
            return view(
                'Dashboard.Voluntario.nueva_clase',
                compact(
                    [
                        'id_programa',
                        'seccion',
                    ]
                )

            );
        }
    }

    public function storeActividades(ActividadesRequest $request)
    {
        // id de la secion
        $id_voluntario = Auth()->user()->trabajador->voluntario->id;

        // dd($request);
        // Log para depurar el método recibido
        logger('Método recibido: ' . $request->method());

        try {
            //Crear el registro de actividad usando los datos validados en ActividadesRequest
            $registro = RegistroActividades::create([
                'id_programa' => $request->id_programa,
                'id_voluntario' => $id_voluntario,
                'nombre' => $request->nombre,
                'fecha_actividad' => $request->fecha_actividad,
                'descripcion_actividad' => $request->descripcion_actividad,
                'resultados_actividad' => $request->resultados_actividad,
                'comentarios_adicionales' => $request->comentarios_adicionales,
            ]);

            // Respuesta exitosa
            return response()->json([
                'success' => true,
                'message' => 'Registro de actividad creado exitosamente.',
                'data' => $registro,
            ], 201);
        } catch (\Exception $e) {
            // Log del error
            logger('Error al crear el registro de actividad: ' . $e->getMessage());

            // Respuesta en caso de error
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al crear el registro de actividad.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function cargarActividades(Request $request){
        $programas = ProgramaEducativo::getProgramasWithPresupuesto();
        return response()->json(
            ['data' => json_encode($programas),]
        );
    }
}
