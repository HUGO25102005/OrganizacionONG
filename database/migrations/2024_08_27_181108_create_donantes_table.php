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
        Schema::create('donantes', function (Blueprint $table) {

            $table->id('ID_Donante');
            $table->string('Nombre_Completo', 255);
            $table->enum('Tipo_Donante', ['Individual', 'Corporativo', 'Organizacion', 'Anonimo']);
            $table->decimal('Monto_Donacion', 10, 2);
            $table->date('Fecha_Donacion');
            $table->unsignedBigInteger('ID_Programa')->nullable();
            $table->string('Metodo_Pago', 100);
            $table->boolean('Requiere_Recibo')->default(false);
            $table->text('Comentarios_Adicionales')->nullable();
            $table->timestamp('Fecha_Registro')->useCurrent();

            $table->foreign('ID_Programa')->references('ID_Programa')->on('programas_educativos')->onDelete('set null');

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donantes');
    }
};
