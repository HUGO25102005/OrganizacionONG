<?php

namespace App\Models\Donaciones;

use App\Models\Apoyo\Funciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Donacion extends Model
{
    use HasFactory;

    protected $table = 'donacion';
    protected $fillable = ['id_transaccion', 'status', 'currency', 'monto', 'id_donante'];

    public static function getDonacionesPorMes()
    {
        return self::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(monto) as total')
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->orderByRaw('YEAR(created_at) DESC, MONTH(created_at) DESC')
            ->get()
            ->map(function ($item) {
                return [
                    'mes' => $item->month,
                    'anio' => $item->year,
                    'total' => $item->total,
                ];
            })
            ->toArray();
    }

    public static function getMontoTotal()
    {
        return self::sum('monto');
    }

    public static function getDonacionesTotal()
    {
        return self::count('monto');
    }

    public static function getTotalRegistros()
    {
        return self::count();
    }

    public static function getTotalMontoSemana()
    {
        $dias = Funciones::obtenerRangoSemana();
        // Obtener las fechas en formato Y-m-d
        $primerDia = $dias['primer_dia'];
        $ultimoDia = $dias['ultimo_dia'];

        return Donacion::where('created_at', '>=', $primerDia)
            ->where('created_at', '<=', $ultimoDia)->sum('monto');
    }
    public static function getTotalMontoMes()
    {
        // Obtener el primer y último día del mes actual en formato Y-m-d
        $primerDiaMes = now()->startOfMonth()->format('Y-m-d');
        $ultimoDiaMes = now()->endOfMonth()->format('Y-m-d');

        // Consultar las donaciones dentro del rango mensual y sumar el monto
        return Donacion::where('created_at', '>=', $primerDiaMes)
            ->where('created_at', '<=', $ultimoDiaMes)
            ->sum('monto');
    }

    public static function getTopDonadores()
    {
        $topDonantes = Donacion::with('donante')
            ->select('id_donante', DB::raw('SUM(monto) as total_donado'))
            ->groupBy('id_donante')
            ->orderBy('total_donado', 'desc')
            ->take(5)
            ->get();
        return $topDonantes;
    }


    // Define la relación con el modelo Donante
    public function donante()
    {
        return $this->belongsTo(Donante::class, 'id_donante');
    }
}
