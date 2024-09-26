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
        Schema::create('comprobante_egreso', function (Blueprint $table) {
            $table->integer('ID_folio');
            $table->integer('ID_no_comprobante');
            $table->tinyInteger('Tipo_movimiento');
            $table->decimal('Monto', 10, 2);
            $table->text('Descripcion');
            $table->unsignedBigInteger('usuarios_ID_Usuario');
            $table->string('imagen_evidencia', 255)->nullable();

            // Clave primaria compuesta
            $table->primary(['ID_no_comprobante', 'ID_folio']);

            // Índices únicos
            $table->unique('ID_folio');
            $table->unique('ID_no_comprobante');

            // Índice para la clave foránea
            $table->index('usuarios_ID_Usuario');

            // Clave foránea hacia 'usuarios'
            $table->foreign('usuarios_ID_Usuario')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprobante_egreso');
    }
};
