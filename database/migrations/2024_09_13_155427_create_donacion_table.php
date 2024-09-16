<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donacion', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_donacion');
            $table->unsignedBigInteger('ID_Donante');
            $table->decimal('Monto_Donacion', 10, 2);
            $table->tinyInteger('Metodo_Pago');
            $table->string('Moneda', 3);
            $table->string('Concepto_donacion', 255);
            $table->string('Frecuencia_Pago', 45);
            $table->string('Area_Interes', 45)->nullable();
            $table->timestamp('Fecha_Registro')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('Ultima_Actualizacion')->nullable();

            // Clave primaria compuesta
            $table->primary(['ID_donacion', 'ID_Donante']);

            // Otros índices necesarios
            $table->unique('ID_donacion');
            $table->index('ID_Donante');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donacion');
    }
};
