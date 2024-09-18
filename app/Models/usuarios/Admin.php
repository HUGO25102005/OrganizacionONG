<?php

namespace App\Models\usuarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

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
        'Rol',
    ];
}
