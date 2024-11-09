<?php

namespace App\Models\usuarios\Beneficiarios;

use App\Models\User;
use App\Models\usuarios\Trabajadores\Trabajador;
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

    public static function getBeneficiariosActivos(){
        return self::join('trabajadores', 'beneficiarios.id_user', '=', 'trabajadores.id_user') // Relación entre las tablas
        ->where('trabajadores.estado', 1) // Filtrar por el estado del trabajador
        ->orderBy('beneficiarios.created_at', 'desc') // Ordenar por la fecha de creación de los beneficiarios
        ->take(5); // Limitar a los primeros 5 resultados;
    }

    public static function getTotalBeneficiariosActivos($estado){
        return self::join('trabajadores', 'beneficiarios.id_user', '=', 'trabajadores.id_user') // Relación entre las tablas
        ->where('trabajadores.estado', $estado) // Filtrar por el estado del trabajador
        ->count();
    }

    public static function getBeneficiarios(){
        return self::join('trabajadores', 'beneficiarios.id_user', '=', 'trabajadores.id_user') // Relación entre las tablas
        ->whereIn('estado', [1, 2, 4]);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_user');
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