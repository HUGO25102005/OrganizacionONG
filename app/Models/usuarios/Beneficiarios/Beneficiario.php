<?php

namespace App\Models\usuarios\Beneficiarios;

use App\Models\User;
use App\Models\Usuarios\Beneficiarios\ContactoEmergencia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;
    // Nombre de la tabla asociada
    protected $table = 'beneficiarios';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'id_user',
        'nivel_educativo',
        'ocupacion',
        'num_dependientes',
        'ingresos_mensuales',
    ];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function contactosEmergencia()
    {
        return $this->hasMany(ContactoEmergencia::class, 'id_beneficiario');
    }

    // Definir que la tabla tiene timestamps (created_at y updated_at)

    public static function getTotalBeneficiarios(){
        return self::count();
    }
}