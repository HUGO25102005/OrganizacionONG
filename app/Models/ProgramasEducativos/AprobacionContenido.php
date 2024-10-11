<?php

namespace App\Models\ProgramasEducativos;

use App\Models\Usuarios\Trabajadores\Coordinador;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AprobacionContenido extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_programa_educativo',
        'id_coordinador',
        'si_no',
    ];

    public function programaEducativo()
    {
        return $this->belongsTo(ProgramaEducativo::class, 'id_programa_educativo');
    }

    public function coordinador()
    {
        return $this->belongsTo(Coordinador::class, 'id_coordinador');
    }
}
