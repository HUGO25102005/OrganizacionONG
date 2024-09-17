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
        Schema::create('caja_fondo', function (Blueprint $table) {
            $table->integer('ID_movimiento');
            $table->tinyInteger('Tipo_movimiento');
            $table->integer('ID_no_comprobante_ingreso')->nullable();
            $table->decimal('Monto', 10, 2);
            $table->integer('ID_no_comprobante')->nullable();

            // Clave primaria
            $table->primary('ID_movimiento');

            // Índices únicos
            $table->unique('ID_movimiento');

            // Índices para las claves foráneas
            $table->index('ID_no_comprobante_ingreso');
            $table->index('ID_no_comprobante');

            // Clave foránea hacia 'registro_ingresos'
            $table->foreign('ID_no_comprobante_ingreso')
                ->references('ID_no_comprobante') // Asegúrate de que el nombre coincide
                ->on('registro_ingresos');

            // Clave foránea hacia 'registro_egresos'
            $table->foreign('ID_no_comprobante')
                ->references('ID_no_comprobante')
                ->on('registro_egresos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caja_fondo');
    }
};
