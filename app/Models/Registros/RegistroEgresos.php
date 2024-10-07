<?php

namespace App\Models\Registros;

use App\Models\Comprobantes\ComprobanteEgreso;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroEgresos extends Model
{
    use HasFactory;
    // Nombre de la tabla asociada
    protected $table = 'registro_egresos';

    // Deshabilitar autoincremento, ya que la clave primaria es compuesta
    public $incrementing = false;

    // Deshabilitar timestamps automáticos
    public $timestamps = false;

    // Definir la clave primaria compuesta
    protected $primaryKey = ['ID_egreso', 'ID_no_comprobante'];

    // Definir el tipo de clave primaria
    protected $keyType = 'integer';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'ID_egreso',
        'ID_no_comprobante',
    ];

    // Relación con el modelo ComprobanteEgreso
    public function comprobanteEgreso()
    {
        return $this->belongsTo(ComprobanteEgreso::class, 'ID_no_comprobante', 'ID_no_comprobante');
    }

    /**
     * Anular la función getKeyName para manejar la clave primaria compuesta.
     */
    public function getKeyName()
    {
        return ['ID_egreso', 'ID_no_comprobante'];
    }
}
