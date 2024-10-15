<?php

namespace App\Models\ProgramasEducativos;

use App\Models\Caja\Presupuesto;
use App\Models\User;
use App\Models\Usuarios\Trabajadores\Trabajador;
use App\Models\Usuarios\Trabajadores\Voluntario;
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


    public static function getTotalProgramasActivos(){
        return self::where('estado', 6)->count();
    }

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

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador'); // Ajusta si es necesario
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user'); // Ajusta si es necesario
    }
}
