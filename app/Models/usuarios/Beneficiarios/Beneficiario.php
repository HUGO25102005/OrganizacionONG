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
        'estado',
        'nivel_educativo',
        'ocupacion',
        'num_dependientes',
        'ingresos_mensuales',
    ];
    public $timestamps = true;

    public static function getBeneficiariosActivos(){
        return self::where('beneficiarios.estado', 1) // Filtrar por el estado del trabajador
        ->orderBy('beneficiarios.created_at', 'asc') // Ordenar por la fecha de creación de los beneficiarios
        ->take(6) // Limitar a los primeros 5 resultados;
        ->get();
    }

    public function getEstadoDescripcion(): string
    {
        // dd($this->estado);
        $estado = $this->estado;

        switch (intval($estado)) {
            case 1:
                return 'Activo';
            case 2:
                return 'Inactivo';
            case 3:
                return 'Solicitado';
            case 4:
                return 'Cancelado';
            default:
                return 'Sin estado';
        }
    }

    public function getNivelEducativo(): string
    {
        // dd($this->estado);
        $nivel_educativo = $this->nivel_educativo;

        switch (intval($nivel_educativo)) {
            case 1:
                return 'Primaria';
            case 2:
                return 'Secunadaria';
            case 3:
                return 'Bachillerato';
            case 4:
                return 'Universidad';
            default:
                return 'Sin estado';
        }
    }

    public static function getTotalBeneficiariosActivos($estado){
        return self::where('beneficiarios.estado', $estado) // Filtrar por el estado del trabajador
        ->count();
    }
    
    public static function getTotalNivelE($nivel){
        return self::where('beneficiarios.nivel_educativo', $nivel) // Filtrar por el estado del trabajador
        ->count();
    }
    
    public static function getBeneficiariosE($estado){
        return self::where('beneficiarios.estado', $estado); // Filtrar por el estado del trabajador
    }

    public static function getBeneficiarios($search = null)
    {
        return self::whereIn('estado', [1, 2])
        ->when($search, function ($query, $search) {
            $query->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            });
        });

    }

    public static function getBeneficiarios2($search = null)
    {
        return self::whereIn('estado', [3, 4])
        ->when($search, function ($query, $search) {
            $query->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            });
        });

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