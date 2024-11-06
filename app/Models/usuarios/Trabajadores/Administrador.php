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
<<<<<<< HEAD
    public static function getAdministradoresActivos(){
        return self::whereHas('trabajador', function ($query) {
            $query->where('estado', '!=', 3);
        });
    }
=======
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

>>>>>>> 08762f89dda1e4f821e89fd993db7e4fea1d9b4f
    
    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }
}
