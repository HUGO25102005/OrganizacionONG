<?php

namespace App\Models\Comprobantes;

use App\Models\Registros\Donacion;
use App\Models\usuarios\Donante;
use App\Models\Registros\RegistroIngresos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprobanteIngreso extends Model
{
    use HasFactory;

    // Define la tabla asociada a este modelo
    protected $table = 'comprobante_ingresos';

    // Desactiva los timestamps si no tienes columnas created_at y updated_at
    public $timestamps = false;

    // Define los atributos que son asignables en masa
    protected $fillable = [
        'ID_folio',
        'ID_no_comprobante',
        'ID_donacion',
        'ID_Donante',
        'Subtotal',
        'Total',
        'Estado',
        'RFC_donante',
        'Direccion_fiscal',
        'Metodo_pago',
        'Fecha_creacion_registro',
    ];

    // Define la clave primaria compuesta
    protected $primaryKey = ['ID_folio', 'ID_no_comprobante'];
    public $incrementing = false; // Desactiva auto-increment para clave primaria compuesta


    //FUNCIONES -------------------------------------
    public static function getTotalDonaciones(){
        return self::sum('Total');
    }



    /**
     * Relación con la tabla `donacion`.
     * Un comprobante de ingreso pertenece a una donación.
     */
    public function donacion()
    {
        return $this->belongsTo(Donacion::class, 'ID_donacion');
    }

    /**
     * Relación con el modelo `Donante`.
     * Un comprobante de ingreso pertenece a un donante.
     */
    public function donante()
    {
        return $this->belongsTo(Donante::class, 'ID_Donante');
    }

    /**
     * Relación con la tabla `RegistroIngreso`.
     * Un comprobante de ingreso puede tener varios registros de ingreso.
     */
    public function registroIngresos()
    {
        return $this->hasMany(RegistroIngresos::class, [
            'ID_folio_comprobante', 
            'no_comprobante_ingreso'
        ], [
            'ID_folio', 
            'ID_no_comprobante'
        ]);
    }
}
