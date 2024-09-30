<?php

namespace App\Models\Registros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\usuarios\Donante;

class Donacion extends Model
{
    use HasFactory;

    // Define la tabla asociada a este modelo
    protected $table = 'donacion';

    // Define los atributos que son asignables en masa
    protected $fillable = [
        'ID_donacion',
        'ID_Donante',
        'Monto_Donacion',
        'Metodo_Pago',
        'Moneda',
        'Concepto_donacion',
        'Frecuencia_Pago',
        'Area_Interes',
        'Fecha_Registro',
        'Ultima_Actualizacion'
    ];

    // La clave primaria es compuesta
    protected $primaryKey = ['ID_donacion', 'ID_Donante'];

    // Especifica que las claves primarias no son auto-incrementadas
    public $incrementing = false;

    // Define que la clave primaria es un array (para manejar la clave primaria compuesta)
    protected $keyType = 'array';


    // FUNCIONES --------------------------------


    /**
     * Relación con la tabla `donantes`.
     * Una donación pertenece a un donante.
     */
    public function donante()
    {
        return $this->belongsTo(Donante::class, 'ID_Donante');
    }
}