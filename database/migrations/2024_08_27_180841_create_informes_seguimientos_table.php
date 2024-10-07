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
        Schema::create('informes_seguimientos', function (Blueprint $table) {

            $table->id('id_informe');
            $table->foreignId('id_programa_educativo')->constrained('programas_educativos')->onDelete('cascade')->comment('Clave foranea de programas_educativos');
            $table->foreignId('id_trabajador')->constrained('trabajadores')->onDelete('cascade')->onUpdate('cascade')->comment('Clave foranea de trabajador');
            //$table->foreignId('id_voluntario')->constrained('trabajadores')->onDelete('set null')->onUpdate('cascade')->comment('Clave foranea de trabajador');
            $table->date('fecha_informe');
            $table->text('resumen_informe');
            $table->text('cumplimiento_indicadores');
            $table->text('desafios_encontrados');
            $table->text('recomendaciones')->nullable();
            $table->text('comentarios_Adicionales')->nullable();
            $table->timestamps();

            // $table->foreign('ID_Programa')->references('ID_Programa')->on('programas_educativos')->onDelete('cascade');
            // $table->foreign('ID_Usuario')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informes_seguimientos');
    }
};
