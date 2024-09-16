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
        Schema::create('registro_ingresos', function (Blueprint $table) {
            $table->integer('ID_ingreso'); // Columna INT para ID_ingreso
            $table->integer('ID_no_comprovante'); // Columna INT para ID_no_comprovante
            $table->integer('ID_folio_comprobante'); // Columna INT para ID_folio_comprobante
            $table->integer('no_comprobante_ingreso'); // Columna INT para no_comprobante_ingreso

            // Clave primaria compuesta
            $table->primary(['ID_ingreso', 'ID_no_comprovante']);

            // Índices únicos
            $table->unique('ID_ingreso');
            $table->unique('ID_no_comprovante');

            // Índice compuesto para la clave foránea
            $table->index(['ID_folio_comprobante', 'no_comprobante_ingreso'], 'fk_registro_ingresos_comprobante_ingreso1_idx');

            // Clave foránea hacia 'comprobante_ingresos'
            $table->foreign(['ID_folio_comprobante', 'no_comprobante_ingreso'])
                ->references(['ID_folio', 'ID_no_comprobante'])
                ->on('comprobante_ingresos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_ingresos');
    }
};
