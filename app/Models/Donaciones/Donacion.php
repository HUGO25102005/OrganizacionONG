<?php

namespace App\Models\Donaciones;

use App\Models\Apoyo\Funciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    use HasFactory;
    
    protected $table = 'donacion';
    protected $fillable = ['id_transaccion', 'payer_id', 'currency', 'monto'];

    /*// Especifica la tabla si el nombre no sigue la convención plural
    protected $table = 'donacion';

    // Define los atributos que se pueden asignar masivamente
    protected $fillable = [
        'id_transaccion',
        'payer_id',
        'currency',
        'monto',
    ];*/

    public static function getMontoTotal(){
        return self::sum('monto');
    }
    public static function getTotalRegistros(){
        return self::count();
    }

    public static function getTotalMontoSemana()
    {
        $dias = Funciones::obtenerRangoSemana();
        // Obtener las fechas en formato Y-m-d
        $primerDia = $dias['primer_dia'];
        $ultimoDia = $dias['ultimo_dia'];

        return Donacion::where('created_at', '>=', $primerDia)
        ->where('created_at', '<=', $ultimoDia)->count();
    }

    // Define la relación con el modelo Donante
    public function donante()
    {
        return $this->belongsTo(Donante::class, 'payer_id');
    }
}