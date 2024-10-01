<?php

namespace App\Models\ProgramasEducativos;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramasEducativos extends Model
{
    use HasFactory;
    // Definir el nombre de la tabla
    protected $table = 'programas_educativos';

    // Definir la clave primaria de la tabla
    protected $primaryKey = 'ID_Programa';

    // Definir los atributos que se pueden asignar de manera masiva
    protected $fillable = [
        'Nombre_Programa',
        'Descripcion',
        'Objetivos',
        'Publico_Objetivo',
        'Duracion',
        'Fecha_Inicio',
        'Fecha_Termino',
        'Recursos_Necesarios',
        'Estado',
        'ID_Usuario',
        'Resultados_Esperados',
        'Presupuesto',
        'Beneficiarios_Estimados',
        'Indicadores_Cumplimiento',
        'Comentarios_Adicionales',
        'Fecha_Registro',
    ];

    // Relación con el modelo User (asumiendo que existe un modelo User)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'ID_Usuario', 'id');
    }

    // Opcionalmente, puedes personalizar los timestamps si no deseas usarlos
    public $timestamps = true;

    // Definir los tipos de datos de las fechas
    protected $casts = [
        'Fecha_Inicio' => 'date',
        'Fecha_Termino' => 'date',
        'Fecha_Registro' => 'datetime',
    ];
}