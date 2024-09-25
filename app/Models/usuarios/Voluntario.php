<?php

namespace App\Models\usuarios;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Voluntario extends User
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $fillable = [
        'Identificacion_Oficial',
        'Pais',
        'Estado',
        'Municipio',
        'Direccion',
        'Dias_Disponibles',
        'Horario_Preferible',
        'Presencial_Virtual',
        'Experiencia_Previa',
        'Habilidades_Conocimientos',
        'Area_Interes',
        'Experiencia_Laboral',
        'Motivo_Voluntariado',
        'Comentarios_Adicionales',
        'Declaracion_Veracidad',


        'Experiencia_Sector_Educativo',
        'Habilidades_Clave',
        'Idiomas',
        'Funcion_Clave',
        'Capacidad_Manejo_Equipos',
        'Conocimientos_Herramientas',
        
        'Referencias_Laborales',
        'Declaracion_Veracidad',
    ];

    protected $hidden = [
        'Password',
        'remember_token',
    ];
}
