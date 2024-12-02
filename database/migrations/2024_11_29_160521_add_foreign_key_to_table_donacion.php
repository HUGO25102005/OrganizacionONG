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
        Schema::table('donacion', function (Blueprint $table) {
            // Agregar la columna id_donante y configurar la clave foránea
            $table->foreignId('id_donante')->nullable()
                ->constrained('donantes') // Tabla referenciada
                ->onDelete('set null') // Si se elimina el registro relacionado, se pone a null
                ->onUpdate('cascade') // Si se actualiza el ID relacionado, se refleja en esta tabla
                ->comment('Clave foránea del donante');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donacion', function (Blueprint $table) {
            // Eliminar la clave foránea primero
            $table->dropForeign(['id_donante']);

            // Eliminar la columna id_donante
            $table->dropColumn('id_donante');
        });
    }
};
