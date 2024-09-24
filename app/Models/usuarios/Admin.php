<?php

namespace App\Models\usuarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $fillable = [
        'Nombre_Completo',
        'Fecha_Nacimiento',
        'Genero',
        'Identificacion_Oficial',
        'Correo_Electronico',
        'Password',
        'Telefono',
        'Pais',
        'Estado',
        'Municipio',
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

    public function isAdmin(): bool{
        return $this->rol == 'Administrador';
    }

    protected $hidden = [
        'Password',
        'remember_token',
    ];
}