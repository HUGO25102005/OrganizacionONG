<?php

namespace App\Models\Usuarios\Trabajadores;

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
    public static function getCoordinadoresActivos()
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
