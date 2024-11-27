<?php

namespace App\Models\usuarios\Trabajadores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinador extends Model
{
    use HasFactory;

    protected $table = 'coordinadores';

    protected $fillable = [
        'id_trabajador',
    ];
    public function getRole(): string
    {
        return 'Coordinador';
    }
    public static function getCoordinadoresActivos( $estado , $fecha_inicio = null, $fecha_fin = null)
    {
        return self::whereHas('trabajador', function ($query) use ($estado, $fecha_inicio, $fecha_fin) {
            $query->where('estado', '=', intval($estado));

            if ($fecha_inicio) {
                $query->where('created_at', '>=', $fecha_inicio);
            }
        
            if ($fecha_fin) {
                $query->where('created_at', '<=', $fecha_fin);
            }
        });
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }
}
