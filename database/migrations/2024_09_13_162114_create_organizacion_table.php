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
        Schema::create('organizacion', function (Blueprint $table) {
            $table->string('Nombre_organizacion', 100);
            $table->string('Direccion', 100);
            $table->tinyInteger('RFC'); // Campo RFC como TINYINT

            // Índice único para RFC
            $table->unique('RFC');

            // Agrega el índice para la columna 'Nombre_organizacion'
            $table->index('Nombre_organizacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizacion');
    }
};
