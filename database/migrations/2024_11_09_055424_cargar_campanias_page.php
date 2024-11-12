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
        Schema::create('cargar_campanias_page', function (Blueprint $table) {

            $table->id();
            $table->foreignId('id_convocatoria')
                            ->constrained('convocatorias')
                            ->onDelete('cascade')
                            ->onUpdate('cascade')
                            ->comment('Clave foranea de convocatorias');
            $table->foreignId('id_administrador')
                            ->constrained('administradores')
                            ->onDelete('no action')
                            ->onUpdate('cascade')
                            ->comment('Clave foranea de registros egresos')
                            ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargar_campanias_page');
    }
};
