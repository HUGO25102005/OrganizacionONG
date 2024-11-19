<?php

namespace App\Models\ProgramasEducativos;

use App\Models\Caja\Presupuesto;
use App\Models\Caja\AprobacionPresupuesto;
use App\Models\User;
use App\Models\Usuarios\Trabajadores\Voluntario;
use App\Models\ProgramasEducativos\InformesSeguimientos;
use App\Models\Registros\RegistroActividades;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaEducativo extends Model
{
    use HasFactory;
    // Definir el nombre de la tabla
    protected $table = 'programas_educativos';

    protected $fillable = [
        'id_voluntario',
        'nombre_programa',
        'descripcion',
        'objetivos',
        'publico_objetivo',
        'duracion',
        'fecha_inicio',
        'fecha_termino',
        'recursos_necesarios',
        'estado',
        'resultados_esperados',
        'id_presupuesto',
        'beneficiarios_estimados',
        'indicadores_cumplimiento',
        'comentarios_adicionales',
    ];


    public static function getProgramasActivos(){
        return self::where('estado', 4)
            ->orderBy('created_at', 'desc');
    }
    
    public static function getProgramas($estado){
        return self::where('estado', $estado);
    }
    
    public static function getProgramasEducativos($search = null){
        return self::whereIn('estado', [2, 4, 5])
        ->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                // Buscar en el nombre del programa educativo
                $query->where('nombre_programa', 'LIKE', '%' . $search . '%')
                    // Buscar en los nombres, apellidos paternos y maternos del voluntario
                    ->orWhereHas('voluntario.trabajador.user', function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%' . $search . '%')
                            ->orWhere('apellido_paterno', 'LIKE', '%' . $search . '%')
                            ->orWhere('apellido_materno', 'LIKE', '%' . $search . '%');
                    });
            });
        });
    }
    public static function getProgramasEducativos1($search = null){
        return self::whereIn('estado', [1, 3, 6])
        ->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                // Buscar en el nombre del programa educativo
                $query->where('nombre_programa', 'LIKE', '%' . $search . '%')
                    // Buscar en los nombres, apellidos paternos y maternos del voluntario
                    ->orWhereHas('voluntario.trabajador.user', function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%' . $search . '%')
                            ->orWhere('apellido_paterno', 'LIKE', '%' . $search . '%')
                            ->orWhere('apellido_materno', 'LIKE', '%' . $search . '%');
                    });
            });
        });
    }

    public function getEstado(){

        $estado = $this->estado;

        switch (intval($estado)) {
            case 1:
                return 'Solicitado';
            case 2:
                return 'Inactivo';
            case 3:
                return 'Aprobado';
            case 4:
                return 'Activo';
            case 5:
                return 'Terminado';
            case 6:
                return 'Cancelado';
            default:
                return 'Sin estado';
        }
    }

    public static function getProgramasAll(){
        return self::whereIn('estado', [2, 4, 5]);
    }
    
    public static function getProgramasAll1(){
        return self::whereIn('estado', [1, 3, 6]);
    }

    public static function getTotalProgramas($estado){
        return self::where('estado', $estado)->count();
    }
    
    public function getTotalBeneficiarios(){
        $id= $this->id;
        return SalonesClase::where('id_programa_educativo', $id)->count();
    }
    

    public function voluntario()
    {
        return $this->belongsTo(Voluntario::class, 'id_voluntario');
    }

    public function presupuesto()
    { 
        return $this->belongsTo(Presupuesto::class, 'id_presupuesto');
    }

    public function aprobacionContenidos()
    {
        return $this->hasOne(AprobacionContenido::class, 'id_programa_educativo');
    }

    public function aprobacionPresupuestos()
    {
        return $this->hasOne(AprobacionPresupuesto::class, 'id_presupuesto');
    }
    
    public function informeSeguimiento()
    {
        return $this->hasOne(InformesSeguimientos::class, 'id_programa_educativo');
    }
    
    public function salonesClases()
    {
        return $this->hasMany(SalonesClase::class, 'id_programa_educativo');
    }
    public function registroActividades()
    {
        return $this->hasMany(RegistroActividades::class, 'id_programa');
    }

}
