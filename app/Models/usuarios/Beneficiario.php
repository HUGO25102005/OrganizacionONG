<?php

namespace App\Models\usuarios;

use App\Models\ProgramasEducativos\ProgramasEducativos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;
    // Nombre de la tabla asociada
    protected $table = 'beneficiarios';

    // Clave primaria de la tabla
    protected $primaryKey = 'ID_Beneficiario';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'Nombre_Completo',
        'Fecha_Nacimiento',
        'Genero',
        'CURP',
        'Estado_Civil',
        'Correo_Electronico',
        'Telefono',
        'Pais',
        'Estado',
        'Municipio',
        'Colonia',
        'Nivel_Educativo',
        'Ocupacion',
        'Ingresos_Mensuales',
        'Numero_Dependientes_Economicos',
        'Nombre_Contacto_Emergencia',
        'Telefono_Contacto_Emergencia',
        'Relacion_Contacto_Emergencia',
        'Fecha_Registro',
        'ID_Programa',
        'Historial_Participaciones',
    ];

    // Definir que la tabla tiene timestamps (created_at y updated_at)
    public $timestamps = true;

    // Relación con el modelo ProgramaEducativo
    public function programa()
    {
        return $this->belongsTo(ProgramasEducativos::class, 'ID_Programa', 'ID_Programa');
    }

    // Definir los tipos de datos de las fechas
    protected $casts = [
        'Fecha_Nacimiento' => 'date',
        'Fecha_Registro' => 'datetime',
    ];
}