<?php

namespace App\Models\Apoyo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DateTime;
class Funciones extends Model
{
    use HasFactory;

    public static function obtenerRangoSemana()
    {
        // Crear un objeto DateTime para la fecha actual
        $fechaActual = new DateTime();

        // Obtener el número de la semana y el año
        $numeroSemana = $fechaActual->format("W");
        $año = $fechaActual->format("o");

        // Calcular el primer día de la semana (lunes)
        $primerDiaSemana = new DateTime();
        $primerDiaSemana->setISODate($año, $numeroSemana);

        // Calcular el último día de la semana (domingo)
        $ultimoDiaSemana = clone $primerDiaSemana; // Clonamos el primer día
        $ultimoDiaSemana->modify('+6 days'); // Sumar 6 días para llegar al domingo

        // Obtener las fechas en formato Y-m-d
        $primerDia = $primerDiaSemana->format("Y-m-d");
        $ultimoDia = $ultimoDiaSemana->format("Y-m-d");

        return [
            'primer_dia' => $primerDia,
            'ultimo_dia' => $ultimoDia,
        ];
    }
}
