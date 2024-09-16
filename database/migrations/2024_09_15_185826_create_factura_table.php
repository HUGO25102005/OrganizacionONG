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
        Schema::create('factura', function (Blueprint $table) {
            $table->integer('ID_factura');
            $table->integer('no_factura');
            $table->unsignedBigInteger('ID_Donante');
            $table->unsignedBigInteger('ID_donacion');
            $table->date('Fecha_emision');
            $table->string('Nombre_organizacion', 100);
            $table->boolean('Es_deducible');
            $table->text('Descripcion')->nullable();

            // Claves primarias y únicas
            $table->primary(['ID_factura', 'no_factura']);
            $table->unique('ID_factura');
            $table->unique('no_factura');

            // Índices
            $table->index(['ID_donacion', 'ID_Donante']);
            $table->index('Nombre_organizacion');

            // Clave foránea a la tabla 'donacion'
            $table->foreign(['ID_donacion', 'ID_Donante'])
                ->references(['ID_donacion', 'ID_Donante'])
                ->on('donacion');

            // Clave foránea a la tabla 'organizacion'
            $table->foreign('Nombre_organizacion')
                  ->references('Nombre')
                  ->on('organizacion');

            $table->dropForeign(['ID_donacion', 'ID_Donante']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura');
    }
};
