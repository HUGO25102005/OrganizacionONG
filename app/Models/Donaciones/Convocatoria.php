<?php

namespace App\Models\Donaciones;

use App\Models\Usuarios\Trabajadores\Administrador;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    use HasFactory;

    protected $table = 'convocatorias_donacion';

    protected $fillable = [
        'id_administrador',
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'objetivo',
        'comentarios',
    ];

    public function administrador()
    {
        return $this->belongsTo(Administrador::class, 'id_administrador');
    }
}
