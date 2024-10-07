<?php

namespace App\Models\usuarios;

use App\Models\Comprobantes\ComprobanteIngreso;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    use HasFactory;

    // Define la tabla asociada a este modelo
    protected $table = 'donantes';

    // Define los atributos que son asignables en masa
    protected $fillable = [
        'Nombre_Completo',
        'Tipo_Donante',
        'Requiere_Recibo',
        'Direccion',
        'Telefono',
        'Correo_electronico',
        'RFC',
        'Domicilio_fiscal',
        'Razon_social',
        'Fecha_Registro',
        'Ultima_Actualizacion'
    ];

    // Clave primaria (ID_Donante)
    protected $primaryKey = 'ID_Donante';
    
    // Especifica que la clave primaria es auto-incrementada
    public $incrementing = true;

    /**
     * Relación con la tabla `comprobante_ingresos`.
     * Un donante puede tener muchos comprobantes de ingreso.
     */
    public function comprobantesIngresos()
    {
        return $this->hasMany(ComprobanteIngreso::class, 'ID_Donante');
    }
}
