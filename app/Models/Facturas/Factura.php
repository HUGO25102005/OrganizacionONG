<?php

namespace App\Models\Facturas;

use App\Models\Registros\Donacion;
use App\Models\usuarios\Donante;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    // Nombre de la tabla asociada
    protected $table = 'factura';

    // Deshabilitar timestamps automáticos (no se incluyen en la migración)
    public $timestamps = false;

    // Definir la clave primaria compuesta
    protected $primaryKey = ['ID_factura', 'no_factura'];

    // Definir el tipo de clave primaria
    protected $keyType = 'integer';

    // Deshabilitar autoincremento ya que las claves primarias no parecen ser autoincrementales
    public $incrementing = false;

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'ID_factura',
        'no_factura',
        'ID_Donante',
        'ID_donacion',
        'Fecha_emision',
        'Nombre_organizacion',
        'Es_deducible',
        'Descripcion'
    ];

    // Relación con la tabla 'donacion'
    public function donacion()
    {
        return $this->belongsTo(Donacion::class, 'ID_donacion', 'ID_donacion');
    }

    // Relación con la tabla 'organizacion'
    public function organizacion()
    {
        return $this->belongsTo(Organizacion::class, 'Nombre_organizacion', 'Nombre_organizacion');
    }

    // Relación con la tabla 'donante'
    public function donante()
    {
        return $this->belongsTo(Donante::class, 'ID_Donante', 'ID_Donante');
    }
}
