<?php

namespace App\Models\Caja;

use App\Models\Registros\RegistroIngresos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CajaFondo extends Model
{
    use HasFactory;
        // Definir el nombre de la tabla
        protected $table = 'caja_fondo';

        // Definir la clave primaria de la tabla
        protected $primaryKey = 'ID_movimiento';
    
        // Indicar que la clave primaria no es autoincrementable (si no es el caso)
        public $incrementing = false;
    
        // Definir los tipos de datos de la clave primaria
        protected $keyType = 'integer';
    
        // Deshabilitar las marcas de tiempo (created_at y updated_at)
        public $timestamps = false;
    
        // Definir los atributos que se pueden asignar de manera masiva
        protected $fillable = [
            'ID_movimiento',
            'Tipo_movimiento',
            'ID_no_comprobante_ingreso',
            'Monto',
            'ID_no_comprobante',
        ];
    
        // Definir las relaciones de clave foránea
        public function registroIngreso()
        {
            return $this->belongsTo(RegistroIngresos::class, 'ID_no_comprobante_ingreso', 'ID_no_comprobante');
        }
    
        public function registroEgreso()
        {
            return $this->belongsTo(RegistroEgreso::class, 'ID_no_comprobante', 'ID_no_comprobante');
        }
}
