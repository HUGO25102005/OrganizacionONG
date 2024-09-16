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
        Schema::create('registro_egresos', function (Blueprint $table) {
            $table->integer('ID_egreso');
            $table->integer('ID_no_comprobante');

            // Clave primaria compuesta
            $table->primary(['ID_egreso', 'ID_no_comprobante']);

            // Índices únicos
            $table->unique('ID_egreso');
            $table->unique('ID_no_comprobante');

            // Índice para la clave foránea
            $table->index('ID_no_comprobante');

            // Clave foránea hacia 'comprobante_egreso'
            $table->foreign('ID_no_comprobante')
                ->references('ID_no_comprobante')
                ->on('comprobante_egreso');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_egresos');
    }
};
