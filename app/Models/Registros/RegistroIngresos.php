<?php

namespace App\Models\Registros;

use App\Models\Comprobantes\ComprobanteIngreso;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroIngresos extends Model
{
    use HasFactory;

    // Especifica la tabla asociada al modelo
    protected $table = 'registro_ingresos';

    // Desactiva los timestamps si no tienes columnas created_at y updated_at
    public $timestamps = false;

    // Define los atributos que son asignables en masa
    protected $fillable = [
        'ID_ingreso',
        'ID_no_comprobante',
        'ID_folio_comprobante',
        'no_comprobante_ingreso',
    ];

    // Define la clave primaria compuesta
    protected $primaryKey = ['ID_ingreso', 'ID_no_comprobante'];
    public $incrementing = false; // Desactiva auto-increment porque la clave es compuesta

    /**
     * Establece la relación con el modelo `ComprobanteIngreso`.
     * Relación personalizada para manejar claves compuestas.
     */
    public function comprobanteIngreso()
    {
        return $this->hasOne(ComprobanteIngreso::class, 'ID_folio', 'ID_folio_comprobante')
                    ->where('ID_no_comprobante', $this->no_comprobante_ingreso);
    }
}
