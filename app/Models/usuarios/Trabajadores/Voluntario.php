<?php

namespace App\Models\usuarios\Trabajadores;

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
    public static function getVoluntariosActivos( $estado )
    {
        return self::whereHas('trabajador', function ($query) use ($estado) {
            $query->where('estado', '=', intval($estado));
        });
    }
    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }
}
