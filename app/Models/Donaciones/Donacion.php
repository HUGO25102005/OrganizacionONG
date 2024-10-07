<?php

namespace App\Models\Donaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    use HasFactory;
    // Especifica la tabla si el nombre no sigue la convención plural
    protected $table = 'donacion';

    // Define los atributos que se pueden asignar masivamente
    protected $fillable = [
        'id_transaccion',
        'payer_id',
        'currency',
        'monto',
    ];

    // Define la relación con el modelo Donante
    public function donante()
    {
        return $this->belongsTo(Donante::class, 'payer_id');
    }
}
