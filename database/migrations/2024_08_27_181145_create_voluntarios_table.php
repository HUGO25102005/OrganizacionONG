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
        Schema::create('voluntarios', function (Blueprint $table) {

            $table->id('ID_Voluntario');
            $table->unsignedBigInteger('ID_Usuario');
            $table->unsignedBigInteger('ID_Programa')->nullable();
            $table->enum('Rol_Voluntario', ['Coordinador', 'Facilitador', 'Asistente', 'Otro']);
            $table->date('Fecha_Inicio');
            $table->date('Fecha_Termino')->nullable();
            $table->text('Responsabilidades');
            $table->integer('Horas_Dedicadas_Semanalmente');
            $table->text('Comentarios_Adicionales')->nullable();
            $table->timestamp('Fecha_Registro')->useCurrent();

            $table->foreign('ID_Usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ID_Programa')->references('ID_Programa')->on('programas_educativos')->onDelete('set null');

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voluntarios');
    }
};
