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
    public static function getAdministradoresActivos(){
        return self::whereHas('trabajador', function ($query) {
            $query->where('estado', '!=', 3);
        });
    }
    
    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }
}
