<?php

namespace App\Models\ProgramasEducativos;

use App\Models\usuarios\Beneficiario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;
    // Especifica la tabla si el nombre no sigue la convención plural
    protected $table = 'evaluaciones';

    // Define los atributos que se pueden asignar masivamente
    protected $fillable = [
        'id_programa',
        'metodologia',
        'resultados_evaluacion',
        'recomendaciones',
        'comentarios_adicionales',
    ];

    // Define la relación con el modelo ProgramaEducativo
    public function programa()
    {
        return $this->belongsTo(ProgramaEducativo::class, 'id_programa');
    }
}