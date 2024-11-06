<?php

namespace App\Models\Donaciones;

use App\Models\Usuarios\Trabajadores\Administrador;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recaudacion extends Model
{
    use HasFactory;
    protected $table = 'recaudacion';

    protected $fillable = [
        'id_administrador',
        'id_convocatoria',
        'cantidad',
        'comentarios'
    ];

    /**
     * Relación con Convocatoria (muchos a uno).
     */
    public function convocatoria()
    {
        return $this->belongsTo(Convocatoria::class, 'id_convocatoria');
    }

    /**
     * Relación con Administrador (uno a muchos, con opción nullable).
     */
    public function administrador()
    {
        return $this->belongsTo(Administrador::class, 'id_administrador');
    }
}
