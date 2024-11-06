<?php

namespace App\Models\Donaciones;

use App\Models\Usuarios\Trabajadores\Administrador;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = 'convocatorias_donacion';

    protected $fillable = [
        'id_administrador',
        'nombre',
=======
    protected $table = 'convocatorias';

    protected $fillable = [
        'id_administrador',
        'titulo',
        'id_producto',
>>>>>>> 08762f89dda1e4f821e89fd993db7e4fea1d9b4f
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'objetivo',
<<<<<<< HEAD
        'comentarios',
    ];

=======
        'cantarticulos',
        'comentarios'
    ];

    public static function getTotalConvocatoriasActivas( $estado ){

        $total = Convocatoria::where('estado', $estado)->count();

        return $total;
    }
    public static function getConvocatoriaPorEstado($estado){

        $campañas = Convocatoria::where('estado', $estado)->get();

        return $campañas;
    }
    
    public function productoSolicitado()
    {
        return $this->belongsTo(ProductoSolicitado::class, 'id_producto');
    }

    /**
     * Relación con Administrador (uno a muchos, con opción nullable).
     */
>>>>>>> 08762f89dda1e4f821e89fd993db7e4fea1d9b4f
    public function administrador()
    {
        return $this->belongsTo(Administrador::class, 'id_administrador');
    }
<<<<<<< HEAD
=======

    /**
     * Relación con Recaudacion (uno a muchos).
     */
    public function recaudaciones()
    {
        return $this->hasMany(Recaudacion::class, 'id_convocatoria');
    }
>>>>>>> 08762f89dda1e4f821e89fd993db7e4fea1d9b4f
}
