<?php

namespace App\Models\usuarios;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends User{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $fillable = [
        'Identificacion_Oficial',
        'Pais',
        'Estado',
        'Municipio',
        'Direccion',
        'Experiencia_Previa',
        'Experiencia_Laboral',
        'Habilidades_Conocimientos',
        'Habilidades_Clave',
        'Experiencia_Sector_Educativo',
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
        'password',
        'remember_token',
    ];
}
