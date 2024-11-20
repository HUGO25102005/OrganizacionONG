<?php

namespace App\Models\ProgramasEducativos;

use App\Models\Caja\Presupuesto;
use App\Models\User;
use App\Models\Usuarios\Trabajadores\Voluntario;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public static function getProgramasWithPresupuesto(){

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
