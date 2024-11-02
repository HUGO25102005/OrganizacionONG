<?php

namespace App\Models\Donaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoSolicitado extends Model
{
    use HasFactory;
    protected $table = 'producto_solicitado';

    protected $fillable = [
        'nombre',
        'estado',
        'descript'
    ];

    /**
     * Relación con Convocatoria (una a muchos).
     */
    public function convocatorias()
    {
        return $this->hasMany(Convocatoria::class, 'id_producto');
    }
}
