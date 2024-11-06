<?php

namespace App\Models\Caja;

use App\Models\Donaciones\Donacion;
use App\Models\Registros\RegistroEgreso;
use App\Models\Registros\RegistroIngreso;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CajaFondo extends Model
{
    use HasFactory;
    // Especifica la tabla si el nombre no sigue la convención plural
    protected $table = 'caja_fondo';

    // Define los atributos que se pueden asignar masivamente
    protected $fillable = [
        'ingreso',
        'egreso',
        'id_ingreso',
        'id_egresos',
    ];


    public static function getMontoDisponible(){

        $montoTotal = Donacion::getMontoTotal();
        $montoEgresos = Presupuesto::getMontoTotal();

        $montoDisponible = $montoTotal - $montoEgresos;

        return $montoDisponible;
    }



    // Define la relación con el modelo RegistroIngreso
    public function registroIngreso()
    {
        return $this->belongsTo(RegistroIngreso::class, 'id_ingreso');
    }

    // Define la relación con el modelo RegistroEgreso
    public function registroEgreso()
    {
        return $this->belongsTo(RegistroEgreso::class, 'id_egresos');
    }
}
