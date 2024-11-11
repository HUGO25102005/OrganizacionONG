<?php

namespace App\Models\Donaciones;

use App\Models\Usuarios\Trabajadores\Administrador;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargarCampaniasPage extends Model
{
    use HasFactory;

    protected $table = 'cargar_campanias_page';

    protected $fillable = [
        'id_convocatoria',
        'id_administrador',
    ];

    // Relación con el modelo Convocatoria
    public function convocatoria()
    {
        return $this->belongsTo(Convocatoria::class, 'id_convocatoria');
    }

    // Relación con el modelo Administrador
    public function administrador()
    {
        return $this->belongsTo(Administrador::class, 'id_administrador');
    }
}
