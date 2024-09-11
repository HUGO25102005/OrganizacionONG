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

            $table->id('ID_Registro');
            $table->unsignedBigInteger('ID_Programa');
            $table->unsignedBigInteger('ID_Beneficiario');
            $table->date('Fecha_Actividad');
            $table->text('Descripcion_Actividad');
            $table->text('Resultados_Actividad')->nullable();
            $table->text('Comentarios_Adicionales')->nullable();
            $table->timestamp('Fecha_Registro')->useCurrent();

            $table->foreign('ID_Programa')->references('ID_Programa')->on('programas_educativos')->onDelete('cascade');
            $table->foreign('ID_Beneficiario')->references('ID_Beneficiario')->on('beneficiarios')->onDelete('cascade');

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
