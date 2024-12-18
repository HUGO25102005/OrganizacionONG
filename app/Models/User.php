<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\usuarios\Beneficiarios\Beneficiario;
use App\Models\Usuarios\Trabajadores\Trabajador;
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
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'email',
        'password',
        'pais',
        'estado',
        'municipio',
        'cp',
        'direccion',
        'genero',
        'telefono',
        'declaracion_veracidad',
    ];

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
     * The attributes that should be cast.
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

    public function getFullName(): string
    {
        return "{$this->name} {$this->apellido_paterno} {$this->apellido_materno}";
    }
    
    public function getGenero(): string
    {
        $genero = $this->genero;

        switch ($genero) {
            case 'M':
                return 'Masculino';
            case 'F':
                return 'Femenino';
            case 'O':
                return 'Otro';
            default:
                return 'Sin género';
        }
    }

    /**
     * Get the trabajador associated with the user.
     */
    public function trabajador()
    {
        return $this->hasOne(Trabajador::class, 'id_user');
    }

    public function beneficiario()
    {
        return $this->hasOne(Beneficiario::class, 'id_user');
    }


}
