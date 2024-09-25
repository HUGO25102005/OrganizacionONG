<?php

namespace App\Models\usuarios;

use App\Models\User;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Coordinador extends User
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $fillable = [
        'Identificacion_Oficial',
        'Direccion',
        'Experiencia_Previa',
        'Habilidades_Conocimientos',
        'Experiencia_Laboral',
        'Experiencia_Sector_Educativo',
        'Habilidades_Clave',
        'Idiomas',
        'Funcion_Clave',
        'Area_Supervision',
        'Capacidad_Manejo_Equipos',
        'Conocimientos_Herramientas',
        'Disponibilidad_Viajes',
        'Compromiso_ONG',
        'Referencias_Laborales',
        'Motivo_Sector_Educativo',
        'Comentarios_Adicionales',
        'Declaracion_Veracidad',
    ];

    protected $hidden = [
        'Password',
        'remember_token',
    ];
}
