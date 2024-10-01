<?php

namespace App\Models\Comprobantes;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprobanteEgreso extends Model
{
    use HasFactory;
    // Nombre de la tabla asociada
    protected $table = 'comprobante_egreso';

    // Deshabilitar autoincremento, ya que la clave primaria es compuesta
    public $incrementing = false;

    // Deshabilitar timestamps automáticos
    public $timestamps = false;

    // Definir la clave primaria compuesta
    protected $primaryKey = ['ID_no_comprobante', 'ID_folio'];

    // Definir la clave primaria como un array
    protected $keyType = 'integer';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'ID_folio',
        'ID_no_comprobante',
        'Tipo_movimiento',
        'Monto',
        'Descripcion',
        'usuarios_ID_Usuario',
        'imagen_evidencia',
    ];

    // Relación con el modelo User (Usuarios)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuarios_ID_Usuario', 'id');
    }

    /**
     * Anular la función getKeyName para manejar la clave primaria compuesta.
     */
    public function getKeyName()
    {
        return ['ID_no_comprobante', 'ID_folio'];
    }
}