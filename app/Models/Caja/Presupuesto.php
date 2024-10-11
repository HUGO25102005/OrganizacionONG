<?php

namespace App\Models\Caja;

use App\Models\ProgramasEducativos\ProgramaEducativo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;
    protected $fillable = [
        'monto',
        'porque',
    ];

    public function programasEducativos()
    {
        return $this->hasMany(ProgramaEducativo::class, 'id_presupuesto');
    }

    public function aprobacionPresupuestos()
    {
        return $this->hasMany(AprobacionPresupuesto::class, 'id_presupuesto');
    }
}
