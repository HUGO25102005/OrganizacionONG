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
        Schema::create('beneficiarios', function (Blueprint $table) {

            $table->id('ID_Beneficiario');
            $table->string('Nombre_Completo', 255);
            $table->date('Fecha_Nacimiento');
            $table->enum('Genero', ['Masculino', 'Femenino', 'Otro']);
            $table->string('CURP', 18)->unique();
            $table->enum('Estado_Civil', ['Soltero', 'Casado', 'Divorciado', 'Viudo', 'Otro'])->nullable();
            $table->string('Correo_Electronico', 255)->unique();
            $table->string('Telefono', 20)->nullable();
            $table->string('Pais', 100);
            $table->string('Estado', 100);
            $table->string('Municipio', 100);
            $table->string('Colonia', 100)->nullable();
            $table->string('Nivel_Educativo', 100)->nullable();
            $table->string('Ocupacion', 100)->nullable();
            $table->decimal('Ingresos_Mensuales', 10, 2)->nullable();
            $table->integer('Numero_Dependientes_Economicos')->nullable();
            $table->string('Nombre_Contacto_Emergencia', 255)->nullable();
            $table->string('Telefono_Contacto_Emergencia', 20)->nullable();
            $table->string('Relacion_Contacto_Emergencia', 100)->nullable();
            $table->timestamp('Fecha_Registro')->useCurrent();
            $table->unsignedBigInteger('ID_Programa')->nullable();
            $table->text('Historial_Participaciones')->nullable();

            $table->foreign('ID_Programa')->references('ID_Programa')->on('programas_educativos')->onDelete('set null');

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiarios');
    }
};
