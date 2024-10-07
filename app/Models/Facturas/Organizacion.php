<?php

namespace App\Models\Facturas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    use HasFactory;
    // Nombre de la tabla asociada
    protected $table = 'organizacion';

    // Deshabilitar timestamps automáticos (no se incluyen en la migración)
    public $timestamps = false;

    // Definir la clave primaria (no se definió en la migración, pero puedes asumir que 'RFC' es la clave primaria)
    protected $primaryKey = 'RFC';

    // Definir el tipo de clave primaria
    protected $keyType = 'integer';

    // Deshabilitar autoincremento, ya que RFC no parece ser autoincremental
    public $incrementing = false;

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'Nombre_organizacion',
        'Direccion',
        'RFC',
    ];
}
