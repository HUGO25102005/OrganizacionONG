<?php

namespace App\Models\Usuarios\Beneficiarios;

use App\Models\usuarios\Beneficiario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactoEmergencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_beneficiario',
        'nombre',
        'relacion',
        'telefono',
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class, 'id_beneficiario');
    }
}
