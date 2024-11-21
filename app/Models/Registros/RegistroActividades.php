<?php

namespace App\Models\Registros;

use App\Models\ProgramasEducativos\ProgramaEducativo;
use App\Models\Usuarios\Trabajadores\Voluntario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroActividades extends Model
{
    use HasFactory;

    // Especifica la tabla si el nombre no sigue la convención plural
    protected $table = 'registro_actividades';

    // Define los atributos que se pueden asignar masivamente
    protected $fillable = [
        'id_programa',
        'id_voluntario',
        'nombre',
        'fecha_actividad',
        'descripcion_actividad',
        'resultados_actividad',
        'comentarios_adicionales',
    ];

    public static function getActividadesByProgama($idProgama){
        return self::where('id_programa',$idProgama)->get();
    }


    // Define las relaciones con otros modelos
    public function programa()
    {
        return $this->belongsTo(ProgramaEducativo::class, 'id_programa');
    }

    public function voluntario()
    {
        return $this->belongsTo(Voluntario::class, 'id_voluntario');

    }    
    
    public static function getTotalActividades(){
        return self::count();
    }
}
