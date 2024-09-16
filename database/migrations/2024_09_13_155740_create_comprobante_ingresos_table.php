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
        Schema::create('comprobante_ingresos', function (Blueprint $table) {
            $table->integer('ID_folio');
            $table->integer('ID_no_comprobante');
            $table->unsignedBigInteger('ID_donacion');
            $table->unsignedBigInteger('ID_Donante');
            $table->decimal('Subtotal', 10, 2);
            $table->decimal('Total', 10, 2);
            $table->string('Estado', 50);
            $table->string('RFC_donante', 20);
            $table->string('Direccion_fiscal', 255);
            $table->string('Metodo_pago', 45)->nullable();
            $table->date('Fecha_creacion_registro');

            // Clave primaria compuesta
            $table->primary(['ID_folio', 'ID_no_comprobante']);

            // Agrega el índice en ID_no_comprobante
            $table->index('ID_no_comprobante');

            // Claves foráneas
            $table->foreign(['ID_donacion', 'ID_Donante'])
                ->references(['ID_donacion', 'ID_Donante'])
                ->on('donacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprobante_ingresos');
    }
};
