<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'Rol',
        'Fecha_Nacimiento',
        'Genero',
        'Identificacion_Oficial',
        'Telefono',
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
        'Especializacion_Cursos',
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
        'Motivo_Voluntariado',
        'Comentarios_Adicionales',
        'Declaracion_Veracidad',
        'Fecha_Registro',
    ];

    public function isTrabajador(): bool{


        return $this->Rol == 'Administrador' || $this->Rol == 'Coordinador' || $this->Rol == 'Voluntario';
    }

    public function getRole(): string{
        return $this->Rol;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
