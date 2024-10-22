<?php

namespace App\Models\Usuarios\Trabajadores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $table = 'administradores';
    protected $fillable = [
        'id_trabajador',
    ];

    public function getRole():string{
        return 'Administrador';
    }
    public static function getAdministradoresActivos($estado, $fecha_inicio = null, $fecha_fin = null)
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
