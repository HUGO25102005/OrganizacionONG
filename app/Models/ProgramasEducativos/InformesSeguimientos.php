<?php

namespace App\Models\ProgramasEducativos;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformesSeguimientos extends Model
{
    use HasFactory;
    
    // Nombre de la tabla asociada
    protected $table = 'informes_seguimientos';

    // Clave primaria de la tabla
    protected $primaryKey = 'ID_Informe';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'ID_Programa',
        'ID_Usuario',
        'Fecha_Informe',
        'Resumen_Informe',
        'Cumplimiento_Indicadores',
        'Desafios_Encontrados',
        'Recomendaciones',
        'Comentarios_Adicionales',
        'Fecha_Registro',
    ];

    // Definir que la tabla tiene timestamps (created_at y updated_at)
    public $timestamps = true;

    // Relación con el modelo ProgramaEducativo (muchos informes pueden estar relacionados con un programa educativo)
    public function programa()
    {
        return $this->belongsTo(ProgramasEducativos::class, 'ID_Programa', 'ID_Programa');
    }

    // Relación con el modelo User (opcional si un usuario está asociado con el informe)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'ID_Usuario', 'id');
    }


    public static function getTotalInformesSeguimineto(){
        return self::count();
    }

    // Definir los tipos de datos de las fechas
    protected $casts = [
        'Fecha_Informe' => 'date',
        'Fecha_Registro' => 'datetime',
    ];
}