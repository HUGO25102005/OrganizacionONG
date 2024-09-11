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

            $table->id('ID_Informe');
            $table->unsignedBigInteger('ID_Programa');
            $table->unsignedBigInteger('ID_Usuario')->nullable();
            $table->date('Fecha_Informe');
            $table->text('Resumen_Informe');
            $table->text('Cumplimiento_Indicadores');
            $table->text('Desafios_Encontrados');
            $table->text('Recomendaciones')->nullable();
            $table->text('Comentarios_Adicionales')->nullable();
            $table->timestamp('Fecha_Registro')->useCurrent();

            $table->foreign('ID_Programa')->references('ID_Programa')->on('programas_educativos')->onDelete('cascade');
            $table->foreign('ID_Usuario')->references('ID_Usuario')->on('usuarios')->onDelete('set null')->onUpdate('cascade');

            $table->timestamps();
            
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
