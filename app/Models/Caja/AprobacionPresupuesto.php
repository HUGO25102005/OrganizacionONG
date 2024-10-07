<?php

namespace App\Models\Caja;

use App\Models\Usuarios\Trabajadores\Administrador;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AprobacionPresupuesto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_presupuesto',
        'id_administrador',
        'si_no',
    ];

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class, 'id_presupuesto');
    }

    public function administrador()
    {
        return $this->belongsTo(Administrador::class, 'id_administrador');
    }
}
