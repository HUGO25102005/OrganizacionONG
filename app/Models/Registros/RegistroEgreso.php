<?php

namespace App\Models\Registros;

use App\Models\Caja\Presupuesto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroEgreso extends Model
{
    use HasFactory;
   // Especifica la tabla si el nombre no sigue la convención plural
   protected $table = 'registro_egresos';

   // Define los atributos que se pueden asignar masivamente
   protected $fillable = [
       'id_presupuesto',
       'monto',
   ];

   // Define la relación con el modelo Presupuesto
   public function presupuesto()
   {
       return $this->belongsTo(Presupuesto::class, 'id_presupuesto');
   }
}
