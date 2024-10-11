<?php

namespace App\Models\ProgramasEducativos;

use App\Models\Usuarios\Trabajadores\Trabajador;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformesSeguimientos extends Model
{
    use HasFactory;

    // Especifica la tabla si el nombre no sigue la convención plural
    protected $table = 'informes_seguimientos';

    // Indica que el ID de la tabla es diferente del convencional (id)
    protected $primaryKey = 'id_informe';

    // Define los atributos que se pueden asignar masivamente
    protected $fillable = [
        'id_programa_educativo',
        'id_trabajador',
        'fecha_informe',
        'resumen_informe',
        'cumplimiento_indicadores',
        'desafios_encontrados',
        'recomendaciones',
        'comentarios_adicionales',
    ];

    // Define las relaciones con otros modelos
    public function programaEducativo()
    {
        return $this->belongsTo(ProgramaEducativo::class, 'id_programa_educativo');
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }


    public static function getTotalInformesSeguimineto()
    {
        return self::count();
    }

    // Definir los tipos de datos de las fechas
    protected $casts = [
        'Fecha_Informe' => 'date',
        'Fecha_Registro' => 'datetime',
    ];
}
