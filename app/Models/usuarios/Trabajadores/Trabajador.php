<?php

namespace App\Models\Usuarios\Trabajadores;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;

    protected $table = 'trabajadores';


    protected $fillable = [
        'id_user',
        'estado',
        'hora_inicio',
        'hora_fin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function administrador()
    {
        return $this->hasOne(Administrador::class, 'id_trabajador');
    }

    public function coordinador()
    {
        return $this->hasOne(Coordinador::class, 'id_trabajador');
    }

    public function voluntario()
    {
        return $this->hasOne(Voluntario::class, 'id_trabajador');
    }

}
