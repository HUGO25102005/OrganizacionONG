<?php

namespace App\Models\ProgramasEducativos;

use App\Models\usuarios\Beneficiario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonesClase extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_programa_educativo',
        'id_beneficiarios',
    ];

    public function programaEducativo()
    {
        return $this->belongsTo(ProgramaEducativo::class, 'id_programa_educativo');
    }

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class, 'id_beneficiarios');
    }
}
