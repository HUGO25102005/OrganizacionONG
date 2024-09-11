<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {

            $table->id('ID_Usuario');
            $table->string('Nombre_Completo');
            $table->date('Fecha_Nacimiento');
            $table->enum('Genero', ['Masculino', 'Femenino', 'Otro']);
            $table->string('Identificacion_Oficial', 50)->nullable();
            $table->string('Correo_Electronico')->unique();
            $table->string('Telefono', 20);
            $table->string('Pais', 100);
            $table->string('Estado', 100);
            $table->string('Municipio', 100);
            $table->string('Direccion', 255)->nullable();
            $table->string('Dias_Disponibles', 100)->nullable();
            $table->enum('Horario_Preferible', ['Mañana', 'Tarde', 'Noche', 'Indiferente']);
            $table->enum('Presencial_Virtual', ['Presencial', 'Virtual', 'Indiferente']);
            $table->text('Experiencia_Previa');
            $table->text('Habilidades_Conocimientos');
            $table->string('Area_Interes', 255);
            $table->text('Especializacion_Cursos')->nullable();
            $table->integer('Experiencia_Laboral')->nullable();
            $table->text('Experiencia_Sector_Educativo')->nullable();
            $table->text('Habilidades_Clave')->nullable();
            $table->string('Idiomas', 100)->nullable();
            $table->text('Funcion_Clave')->nullable();
            $table->string('Area_Supervision', 255)->nullable();
            $table->integer('Capacidad_Manejo_Equipos')->nullable();
            $table->text('Conocimientos_Herramientas')->nullable();
            $table->boolean('Disponibilidad_Viajes')->default(false);
            $table->text('Compromiso_ONG')->nullable();
            $table->text('Referencias_Laborales')->nullable();
            $table->text('Motivo_Sector_Educativo')->nullable();
            $table->text('Motivo_Voluntariado');
            $table->text('Comentarios_Adicionales')->nullable();
            $table->boolean('Declaracion_Veracidad')->default(false);
            $table->enum('Rol', ['Administrador', 'Coordinador', 'Voluntario']);
            $table->timestamp('Fecha_Registro')->useCurrent();

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
