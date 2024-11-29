<?php

namespace App\Http\Controllers\Dashboard\Voluntario;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Programa\ProgramaController;
use App\Http\Requests\Programa\ActividadesRequest;
use App\Http\Requests\Programa\ProgramaRequest;
use App\Models\Caja\Presupuesto;
use App\Models\ProgramasEducativos\InformesSeguimientos;
use App\Models\ProgramasEducativos\ProgramaEducativo;
use App\Models\Registros\RegistroActividades;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class DashboardVolunController extends Controller
{
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

        if ($seccion == 1) {
            $colores = $this->colores;
            $idVoluntario = Auth()->user()->trabajador->voluntario->id;
            $misProgramas = ProgramaEducativo::getProgramasForVoluntario($idVoluntario);

            return view('Dashboard.Voluntario.mis_clases', compact('seccion', 'misProgramas', 'colores'));
        } else {

            $idVoluntario = Auth()->user()->trabajador->voluntario->id;
            $claFinalizadas = ProgramaEducativo::getProgramasForVoluntario($idVoluntario, 5);

            return view('Dashboard.Voluntario.mis_clases', compact(['seccion', 'claFinalizadas']));
        }
    }
    public function nuevaClase(Request $request)
    {
        $id_voluntario = Auth()->user()->trabajador->voluntario->id;

        $actividades = [];

        if (empty($request->seccion)) {
            $seccion = $request->get('seccion', 1);



            return view('Dashboard.Voluntario.nueva_clase', compact(['seccion', 'actividades']));
        } else {
            $seccion = $request->seccion;

            $misSolicitudes = ProgramaEducativo::getProgramasForVoluntarioTable($id_voluntario)->paginate(10);
            // dd($misSolicitudes);
            return view('Dashboard.Voluntario.nueva_clase', compact(['seccion', 'actividades', 'misSolicitudes']));
        }
    }

    public function storeProgramaEducativo(Request $request)
    {
        try {
            $id_voluntario = Auth()->user()->trabajador->voluntario->id;

            $duracion = ProgramaEducativo::getDuracion($request->fecha_inicio, $request->fecha_termino);

            $presupuesto = Presupuesto::create([
                'monto' => $request->monto_presupuesto, // Asignación del monto de presupuesto
                'porque' => $request->motivo_presupuesto, // Asignación del motivo de presupuesto
            ]);

            $programa = ProgramaEducativo::create([
                'id_voluntario' => $id_voluntario,
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

            // Verificar si el programa fue creado correctamente
            if ($programa) {
                return response()->json([
                    'success' => true,
                    'message' => 'Programa educativo creado con éxito.',
                    'id_programa' => 48,
                    'seccion' => 1, // Puedes incluir otras variables necesarias aquí
                ]);
            }

            // En caso de fallo
            return response()->json([
                'success' => false,
                'message' => 'No se pudo crear el programa educativo.',
            ], 500);
        } catch (\Exception $e) {
            // Manejo de excepciones
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function storeActividades(ActividadesRequest $request)
    {
        // id de la secion
        $id_voluntario = Auth()->user()->trabajador->voluntario->id;

        // dd($request);
        // Log para depurar el método recibido
        logger('Método recibido: ' . $request->method());

        $programa = ProgramaEducativo::find($request->id_programa); // Recuperar directamente el registro

        if (!$programa) {
            // Respuesta en caso de que no exista el programa
            return response()->json([
                'success' => false,
                'message' => 'El programa educativo no existe.',
            ], 404);
        }

        $fechaInicio = $programa->fecha_inicio;
        $fechaFin = $programa->fecha_fin;

        $fechaActividad = $request->fecha_actividad;

        // Validar si la fecha de actividad está fuera del rango
        if ($fechaActividad < $fechaInicio || $fechaActividad > $fechaFin) {
            // Registrar el error (opcional)
            logger('Error al crear el registro de actividad: La fecha de la actividad está fuera del rango permitido.');

            // Respuesta en caso de error
            return response()->json([
                'success' => false,
                'message' => 'La fecha de la actividad debe estar dentro del rango establecido entre la fecha de inicio y la fecha de fin del programa.',
            ], 400);
        }

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

            $tupla = '

            ';
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

    public function cargarActividadesEnTabla(request $request)
    {
        // dd($request);
        $html = '';
        $seccion = 1;
        // Obtener actividades relacionadas al programa
        $actividades = RegistroActividades::getActividadesByProgama($request->id_programa);

        // Generar la vista de los <tr> con las actividades
        $html = view('Dashboard.Voluntario.layouts.tr_tablas.filas_actividades', compact('actividades', 'seccion'))->render();

        // dd($html);
        // Retornar la vista generada como respuesta
        return response()->json(['html' => $html]);
    }
    public function cargarActividades(Request $request)
    {
        $programas = ProgramaEducativo::getProgramasWithPresupuesto();
        return response()->json(
            ['data' => json_encode($programas),]
        );
    }

    public function getInformacionClase(Request $request)
    {
        $id_voluntario = Auth()->user()->trabajador->voluntario->id;
        $idClase = $request->id_clase;
        $info = ProgramaEducativo::obtenerDetallesClase($id_voluntario, $idClase);
        // dd($info);
        return response()->json(['data' => json_encode($info)]);
    }

    public function terminarClase(Request $request)
    {

        $validatedData = $request->validate([
            'id_programa_educativo' => 'required|integer',
            'id_trabajador' => 'required|integer',
            'fecha_informe' => 'required|date',
            'resumen_informe' => 'required|string',
            'cumplimiento_indicadores' => 'required|string',
            'desafios_encontrados' => 'required|string',
            'recomendaciones' => 'required|string',
            'comentarios_adicionales' => 'nullable|string', // Opcional
            'descripcion_reporte' => 'required|string',
        ]);

        // Crear el registro en la base de datos
        $reporte = InformesSeguimientos::create($validatedData);

        // Cambiar el estatus del programa si el informe se creó correctamente
        if ($reporte) {
            // Buscar el programa educativo asociado
            $programa = ProgramaEducativo::find($validatedData['id_programa_educativo']);
            if ($programa) {
                // Actualizar el estatus del programa
                $programa->estado = 5; // Cambia el valor según tu lógica
                $programa->save(); // Guardar los cambios
                $data = 'ok';
            } else {
                $data = 'error_programa_no_encontrado';
            }
        } else {
            $data = 'error';
        }
        return response()->json(['data' => json_encode($data)]);
    }

    public function getInformacionClaseTerminada(Request $request)
    {
        $id_voluntario = Auth()->user()->trabajador->voluntario->id;
        $idClase = $request->id_clase;

        $info = ProgramaEducativo::obtenerDetallesClase($id_voluntario, $idClase, 5);
        // dd($info);
        return response()->json(['data' => json_encode($info)]);
    }
}
