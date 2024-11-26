<?php

namespace App\Models\ProgramasEducativos;

use App\Models\Caja\Presupuesto;
use App\Models\User;
use App\Models\Usuarios\Trabajadores\Voluntario;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProgramaEducativo extends Model
{
    use HasFactory;
    // Definir el nombre de la tabla
    protected $table = 'programas_educativos';

    protected $fillable = [
        'id_voluntario',
        'nombre_programa',
        'descripcion',
        'objetivos',
        'publico_objetivo',
        'duracion',
        'fecha_inicio',
        'fecha_termino',
        'recursos_necesarios',
        'estado',
        'resultados_esperados',
        'id_presupuesto',
        'beneficiarios_estimados',
        'indicadores_cumplimiento',
        'comentarios_adicionales',
    ];

    // public static function obtenerDetallesClaseBene($idBene, $idClase, $estado = 1)
    // {
    //     // Validar parámetros (opcional, dependiendo del contexto)
    //     if (!is_numeric($idBene) || !is_numeric($idClase) || !is_numeric($estado)) {
    //         return ['error' => 'Parámetros inválidos'];
    //     }

    //     // Obtener lista de alumnos relacionada
    //     $clase = SalonesClase::where('id_beneficiarios', '=', $idBene)
    //         ->with(['beneficiario', 'user', 'programasEtucativos'])
    //         ->get();

    //     if ($estado == 1) {
    //         return [
    //             'detallesClase' => $detallesClase,
    //             'clase' => $clase
    //         ];
    //     } else {
    //         $reporte = InformesSeguimientos::where('id_programa_educativo', '=', intval($idClase))->first();
    //         // dd($reporte);
    //         return [
    //             'detallesClase' => $detallesClase,
    //             'clase' => $clase,
    //             'reporte' => $reporte
    //         ];
    //     }
    //     // Devolver los datos organizados
    // }

    public static function obtenerDetallesClase($idVoluntario, $idClase, $estado = 1)
    {
        // Validar parámetros (opcional, dependiendo del contexto)
        if (!is_numeric($idVoluntario) || !is_numeric($idClase) || !is_numeric($estado)) {
            return ['error' => 'Parámetros inválidos'];
        }

        // Obtener información de la clase
        $detallesClase = self::where([
            ['id_voluntario', '=', $idVoluntario],
            ['id', '=', $idClase],
            ['estado', '=', $estado],
        ])->with(['presupuesto'])->first();

        // Verificar si se encontró la clase
        if (!$detallesClase) {
            return ['error' => 'Clase no encontrada'];
        }

        // Obtener lista de alumnos relacionada
        $listaAlumnos = SalonesClase::where('id_programa_educativo', '=', $idClase)
            ->with(['beneficiario.user'])
            ->get();

        if ($estado == 1) {
            return [
                'detallesClase' => $detallesClase,
                'listaAlumnos' => $listaAlumnos
            ];
        } else {
            $reporte = InformesSeguimientos::where('id_programa_educativo', '=', intval($idClase))->first();
            // dd($reporte);
            return [
                'detallesClase' => $detallesClase,
                'listaAlumnos' => $listaAlumnos,
                'reporte' => $reporte
            ];
        }
        // Devolver los datos organizados
    }
    public static function obtenerDetalles($idClase)
    {
        // Validar parámetro (opcional)
        if (!is_numeric($idClase)) {
            return ['error' => 'Parámetro inválido'];
        }

        // Obtener información de la clase sin incluir presupuesto
        $detallesClase = self::where('id', '=', intval($idClase))
            ->with(['salonesClases', 'salonesClases.beneficiario']) // Añade las relaciones relevantes, si las necesitas
            ->first();

        // Verificar si se encontró la clase
        if (!$detallesClase) {
            return ['error' => 'Clase no encontrada'];
        }

        // Devolver los detalles de la clase
        return $detallesClase;
    }

    public static function getProgramasForVoluntarioTable($idVoluntario, $estado = 1)
    {
        return self::where('id_voluntario', $idVoluntario)
            ->where('estado', $estado)->get();
    }
    public static function getSoliRecursos()
    {
        return self::with(['presupuesto']);
    }
    public function getTieneAprobacionContenidoAttribute()
    {
        return $this->aprobacionContenidos()->exists();
    }

    public function getTieneAprobacionPresupuestoAttribute()
    {
        return $this->presupuesto && $this->presupuesto->estado_aprobado; // Suponiendo que el presupuesto tiene un atributo estado_aprobado
    }
    public static function getDuracion($fecha_inicio, $fecha_termino)
    {
        $fechaInicio = new DateTime($fecha_inicio);
        $fechaTermino = new DateTime($fecha_termino);

        // Calcular la diferencia entre las dos fechas
        $diferencia = $fechaInicio->diff($fechaTermino);

        // Obtener la diferencia en días
        $duracion = $diferencia->days;

        // Verificar si la fecha de inicio es mayor que la de término (diferencia negativa)
        if ($fechaInicio > $fechaTermino) {
            $duracion *= -1; // Convertir a número negativo si es necesario
        }

        return $duracion;
    }

    public static function getProgramasActivos()
    {
        return self::where('estado', 4)
            ->orderBy('created_at', 'desc')
            ->take(5);
    }

    public static function getTotalProgramas($estado)
    {
        return self::where('estado', $estado)->count();
    }

    public static function getTotalSolicitudesProgramas()
    {
        return self::whereIn('estado', [1, 2])->count();
    }

    public static function getProgramasWithPresupuesto()
    {

        $programas = self::with('presupuestos')->get();
        return $programas;
    }
    //* FUNCIONES DE RELACIONES
    public function voluntario()
    {
        return $this->belongsTo(Voluntario::class, 'id_voluntario');
    }

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class, 'id_presupuesto');
    }

    public function aprobacionContenidos()
    {
        return $this->hasMany(AprobacionContenido::class, 'id_programa_educativo');
    }

    public function salonesClases()
    {
        return $this->hasMany(SalonesClase::class, 'id_programa_educativo');
    }
}
