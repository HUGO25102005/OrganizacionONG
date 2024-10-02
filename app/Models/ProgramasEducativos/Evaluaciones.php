<?php

namespace App\Models\ProgramasEducativos;

use App\Models\usuarios\Beneficiario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluaciones extends Model
{
    use HasFactory;
    // Nombre de la tabla asociada
    protected $table = 'evaluaciones';

    // Clave primaria de la tabla
    protected $primaryKey = 'ID_Evaluacion';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'ID_Programa',
        'ID_Beneficiario',
        'Fecha_Evaluacion',
        'Metodologia',
        'Resultados_Evaluacion',
        'Recomendaciones',
        'Comentarios_Adicionales',
        'Fecha_Registro',
    ];

    // Definir que la tabla tiene timestamps (created_at y updated_at)
    public $timestamps = true;

    // Relación con el modelo ProgramaEducativo
    public function programa()
    {
        return $this->belongsTo(ProgramasEducativos::class, 'ID_Programa', 'ID_Programa');
    }

    // Relación con el modelo Beneficiario
    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class, 'ID_Beneficiario', 'ID_Beneficiario');
    }

    // Definir los tipos de datos de las fechas
    protected $casts = [
        'Fecha_Evaluacion' => 'date',
        'Fecha_Registro' => 'datetime',
    ];
}