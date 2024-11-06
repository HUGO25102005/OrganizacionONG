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
<<<<<<< HEAD
    public static function getVoluntariosActivos()
    {
        return self::whereHas('trabajador', function ($query) {
            $query->where('estado', '!=', 3);
=======
    public static function getVoluntariosActivos( $estado )
    {
        return self::whereHas('trabajador', function ($query) use ($estado) {
            $query->where('estado', '=', intval($estado));
>>>>>>> 08762f89dda1e4f821e89fd993db7e4fea1d9b4f
        });
    }
    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }
}
