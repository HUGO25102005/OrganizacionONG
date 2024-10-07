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

            $table->id('id_movimiento');
            $table->decimal('ingreso', 10, 2);
            $table->decimal('egreso', 10, 2);
            $table->foreignId('id_ingreso')
                            ->constrained('registro_ingresos')
                            ->onDelete('cascade')
                            ->onUpdate('cascade')
                            ->comment('Clave foranea de registros ingresos');
            $table->foreignId('id_egresos')
                            ->constrained('registro_egresos')
                            ->onDelete('cascade')
                            ->onUpdate('cascade')
                            ->comment('Clave foranea de registros egresos');
            $table->timestamps();

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
