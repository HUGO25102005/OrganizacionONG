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
            $table->id();
            $table->string('id_transaccion');
            $table->foreignId('payer_id')
                                ->constrained('donantes')
                                ->onDelete('cascade')
                                ->onUpdate('cascade')
                                ->comment('Clave foranea del donante');
            $table->tinyInteger('currency');
            $table->decimal('monto', 10, 2);
            $table->timestamps();
        });

        Schema::create('convocatorias_donacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_administrador')->nullable()
                                ->constrained('administradores')
                                ->onDelete('set null')
                                ->onUpdate('cascade')
                                ->comment('Clave foranea de usuarios');
            $table->string('nombre', 255);
            $table->text('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->enum('estado', [1,2,3])->comment('1 = activo, 2 = finalizada, 3 = cancelada');
            $table->text('objetivo');
            $table->text('comentarios');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donacion');
        Schema::dropIfExists('convocatorias_donacion');
    }
};
