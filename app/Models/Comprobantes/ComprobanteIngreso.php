<?php

namespace App\Models\Comprobantes;

use App\Models\Apoyo\Funciones;
use App\Models\Registros\Donacion;
use App\Models\usuarios\Donante;
use App\Models\Registros\RegistroIngresos;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprobanteIngreso extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada
    protected $table = 'comprobante_ingresos';

    // Deshabilitar timestamps automáticos si no se usan
    public $timestamps = false;

    // Definir la clave primaria compuesta
    protected $primaryKey = ['ID_folio', 'ID_no_comprobante'];

    // Definir el tipo de clave primaria
    protected $keyType = 'integer';

    // Deshabilitar el autoincremento, ya que las claves primarias no son autoincrementales
    public $incrementing = false;

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'ID_folio',
        'ID_no_comprobante',
        'ID_donacion',
        'ID_Donante',
        'Subtotal',
        'Total',
        'Estado',
        'RFC_donante',
        'Direccion_fiscal',
        'Metodo_pago',
        'Fecha_creacion_registro'
    ];

    //FUNCIONES -------------------------------------
    public static function getMontoTotalDonaciones()
    {
        return self::sum('Total');
    }
    public static function getTotalRecaudadoSemana()
    {
        $dias = Funciones::obtenerRangoSemana();
        // Obtener las fechas en formato Y-m-d
        $primerDia = $dias['primer_dia'];
        $ultimoDia = $dias['ultimo_dia'];


        return self::where('Fecha_creacion_registro', '>=', $primerDia)
            ->where('Fecha_creacion_registro', '<=', $ultimoDia)
            ->sum('Total');
    }

    //FIN FUNCIONES -------------------------------------



    // Relación con la tabla 'donacion'
    public function donacion()
    {
        return $this->belongsTo(Donacion::class, ['ID_donacion', 'ID_Donante'], ['ID_donacion', 'ID_Donante']);
    }




    // FUNCIONES APOYO--------------------------

}
