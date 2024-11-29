<?php

namespace App\Http\Controllers\Programa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Programa\ProgramaRequest;
use App\Models\ProgramasEducativos\ProgramaEducativo;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    public function store(ProgramaRequest $request)
    {

        // Crear el programa educativo
        $programa = ProgramaEducativo::create([
            'id_voluntario' => $request->id_voluntario,
            'nombre_programa' => $request->nombre_programa,
            'descripcion' => $request->descripcion,
            'objetivos' => $request->objetivos,
            'publico_objetivo' => $request->publico_objetivo,
            'duracion' => $request->duracion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_termino' => $request->fecha_termino,
            'recursos_necesarios' => $request->recursos_necesarios,
            'estado' => $request->estado,
            'resultados_esperados' => $request->resultados_esperados,
            'id_presupuesto' => $request->id_presupuesto,
            'beneficiarios_estimados' => $request->beneficiarios_estimados,
            'indicadores_cumplimiento' => $request->indicadores_cumplimiento,
            'comentarios_adicionales' => $request->comentarios_adicionales,
        ]);

        // Redireccionar o retornar respuesta
        return redirect()->route('programas_educativos.index')->with('success', 'Programa educativo creado exitosamente.');
    }
}
