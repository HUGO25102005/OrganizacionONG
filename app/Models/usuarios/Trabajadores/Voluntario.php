<?php

namespace App\Models\Usuarios\Trabajadores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voluntario extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_trabajador',
        'fecha_inicio',
        'fecha_termino',
        'hrs_dedicadas_semana',
        'comentarios',
    ];

    public function getRole(): string
    {
        return 'Voluntario';
    }
    public static function getVoluntariosActivos()
    {
        return self::whereHas('trabajador', function ($query) {
            $query->where('estado', '!=', 3);
        });
    }
    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }
}
