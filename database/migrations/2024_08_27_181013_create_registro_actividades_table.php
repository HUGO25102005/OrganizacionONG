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
        Schema::create('registro_actividades', function (Blueprint $table) {

            $table->id();
            $table->foreignId('id_programa')->constrained('programas_educativos')->onDelete('cascade')->onUpdate('cascade')->comment('Clave foranea del programa educativo');
            $table->foreignId('id_voluntario')->constrained('voluntarios')->onDelete('cascade')->onUpdate('cascade')->comment('Clave foranea de voluntario');
            $table->date('fecha_actividad');
            $table->text('descripcion_actividad');
            $table->text('resultados_actividad');
            $table->text('comentarios_adicionales')->nullable();

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_actividades');
    }
};
