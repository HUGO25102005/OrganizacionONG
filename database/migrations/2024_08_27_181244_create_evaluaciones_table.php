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
        Schema::create('evaluaciones', function (Blueprint $table) {

            $table->id();
            $table->foreignId('id_programa')
                                ->constrained('programas_educativos')
                                ->onDelete('cascade')
                                ->onUpdate('cascade')
                                ->comment('Clave foranea del programa educativo');
            $table->text('metodologia');
            $table->text('resultados_evaluacion')->comment('es una retroalimentacion');
            $table->text('recomendaciones')->nullable();
            $table->text('comentarios_adicionales')->nullable();


            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluaciones');
    }
};
