<?php

namespace App\Models\Donaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    use HasFactory;
    // Especifica la tabla si el nombre no sigue la convención plural
    protected $table = 'donantes';

    // Define los atributos que se pueden asignar masivamente
    protected $fillable = [
        'payer_id',
        'email',
        'Tipo_Donante',
        'first_name',
        'last_name',
        'country_code',
    ];

    // Especifica las reglas para la validación de campos únicos
    public static $rules = [
        'payer_id' => 'unique:donantes',
    ];

    public function getFullName(){
        return $this->first_name . ' ' . $this->last_name; 
    }
}
