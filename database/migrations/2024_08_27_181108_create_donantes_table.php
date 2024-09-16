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

            $table->bigIncrements('ID_Donante');
            $table->string('Nombre_Completo', 255);
            $table->enum('Tipo_Donante', ['Individual', 'Corporativo', 'Organizacion', 'Anonimo']);
            $table->boolean('Requiere_Recibo')->default(false);
            $table->string('Direccion', 100);
            $table->string('Telefono', 10);
            $table->string('Correo_electronico', 100);
            $table->string('RFC', 20)->nullable();
            $table->string('Domicilio_fiscal', 255)->nullable();
            $table->string('Razon_social', 255)->nullable();
            $table->timestamp('Fecha_Registro')->useCurrent();
            $table->timestamp('Ultima_Actualizacion')->nullable();
            $table->timestamps();

            $table->unique('ID_Donante');
            $table->unique('RFC');
            
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
