<?php

namespace App\Models\Registros;

use App\Models\Comprobantes\ComprobanteIngreso;
use App\Models\Donaciones\Donacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroIngreso extends Model
{
    use HasFactory;

    // Especifica la tabla si el nombre no sigue la convención plural
    protected $table = 'registro_ingresos';

    // Define los atributos que se pueden asignar masivamente
    protected $fillable = [
        'id_donacion',
        'monto',
    ];

    // Define la relación con el modelo Donacion
    public function donacion()
    {
        return $this->belongsTo(Donacion::class, 'id_donacion');
    }
}
