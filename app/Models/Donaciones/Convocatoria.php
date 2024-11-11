<?php

namespace App\Models\Donaciones;

use App\Models\Usuarios\Trabajadores\Administrador;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    use HasFactory;

    protected $table = 'convocatorias';

    protected $fillable = [
        'id_administrador',
        'titulo',
        'id_producto',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'objetivo',
        'cantarticulos',
        'comentarios'
    ];

    public static function getTotalConvocatoriasPorEstado($estado)
    {

        $total = Convocatoria::where('estado', $estado)->count();

        return $total;
    }
    public static function getConvocatoriaPorEstado($estado)
    {

        $campañas = Convocatoria::where('estado', $estado)->get();

        return $campañas;
    }

    public static function getConvocatoriaList($estado)
    {
        if ($estado == 0) {
            // Trae todas las convocatorias y las ordena por estado de forma ascendente
            $campañas = Convocatoria::addSelect([
                'artfaltantes' => Recaudacion::selectRaw('COALESCE(SUM(cantidad), 0)')
                    ->whereColumn('id_convocatoria', 'convocatorias.id')
                    ->limit(1),
                'isInPage' => CargarCampaniasPage::selectRaw('1')
                    ->whereColumn('id_convocatoria', 'convocatorias.id')
                    ->limit(1)
            ])->orderBy('estado', 'asc');
        } else {
            // Filtra por estado específico
            $campañas = Convocatoria::where('estado', $estado)
                ->addSelect([
                    'artfaltantes' => Recaudacion::selectRaw('COALESCE(SUM(cantidad), 0)')
                        ->whereColumn('id_convocatoria', 'convocatorias.id')
                        ->limit(1)
                ]);
        }

        return $campañas;
    }


    public static function setEstatusFinalizar($id_convocatoria)
    {
        self::where('id', $id_convocatoria)->update(['estado' => 2]);
    }
    public function productoSolicitado()
    {
        return $this->belongsTo(ProductoSolicitado::class, 'id_producto');
    }

    public static function getTotalProductosSolicitdos(): int
    {
        return self::where('estado', '!=', 3)->sum('cantarticulos');
    }
    /**
     * Relación con Administrador (uno a muchos, con opción nullable).
     */
    public function administrador()
    {
        return $this->belongsTo(Administrador::class, 'id_administrador');
    }

    /**
     * Relación con Recaudacion (uno a muchos).
     */
    public function recaudaciones()
    {
        return $this->hasMany(Recaudacion::class, 'id_convocatoria');
    }

    public function producto()
    {
        return $this->belongsTo(ProductoSolicitado::class, 'id_producto');
    }
}
