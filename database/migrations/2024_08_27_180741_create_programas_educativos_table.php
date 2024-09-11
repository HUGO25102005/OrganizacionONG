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
        Schema::create('programas_educativos', function (Blueprint $table) {
            
            $table->id('ID_Programa');
            $table->string('Nombre_Programa', 255);
            $table->text('Descripcion');
            $table->text('Objetivos');
            $table->string('Publico_Objetivo', 255);
            $table->integer('Duracion');
            $table->date('Fecha_Inicio');
            $table->date('Fecha_Termino');
            $table->text('Recursos_Necesarios');
            $table->enum('Estado', ['Planificacion', 'Ejecucion', 'Finalizado', 'Cancelado']);
            $table->unsignedBigInteger('ID_Usuario')->nullable();
            $table->text('Resultados_Esperados');
            $table->decimal('Presupuesto', 10, 2);
            $table->integer('Beneficiarios_Estimados')->nullable();
            $table->text('Indicadores_Cumplimiento')->nullable();
            $table->text('Comentarios_Adicionales')->nullable();
            $table->timestamp('Fecha_Registro')->useCurrent();

            $table->foreign('ID_Usuario')->references('ID_Usuario')->on('usuarios')->onDelete('set null')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programas_educativos');
    }
};
