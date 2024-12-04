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

    public static function getMontoTotal(){
        return self::whereHas('aprobacionPresupuestos', function ($query) {
            $query->where('si_no', true); // Ajusta 'estado' según tu modelo
        })->sum('monto');
    }
    // public static function programasEducativos()
    // {
    //     return $this->hasMany(ProgramaEducativo::class, 'id_presupuesto');
    // }


    public function aprobacionPresupuestos()
    {
        return $this->hasMany(AprobacionPresupuesto::class, 'id_presupuesto');
    }
}
