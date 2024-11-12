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
            $table->foreignId('id_donante')
                                ->constrained('donantes')
                                ->onDelete('cascade')
                                ->onUpdate('cascade')
                                ->comment('Clave foranea del donante');
            $table->string('currency', 4);
            $table->decimal('monto', 10, 2);
            $table->timestamps();
        });

        Schema::create('producto_solicitado', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->enum('estado', [1,2,3])->comment('1 = en convocatoria(activo), 
                                                                                2 = meta ( se recaudo todo lo que se necesitaba ), 
                                                                                3 = pendiente ( no se logro recaudar todo, puede volverser a usar en otra convocatoria)');
            $table->text('descript')->comment('descripcion del producto solicitado');  
            $table->timestamps();
        });



        Schema::create('convocatorias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_administrador')->nullable()
                                ->constrained('administradores')
                                ->onDelete('set null')
                                ->onUpdate('cascade')
                                ->comment('Clave foranea de usuarios');
            $table->string('titulo', 255);
            $table->foreignId('id_producto')->constrained('producto_solicitado')
                                                    ->onDelete('cascade')
                                                    ->onUpdate('cascade');
            $table->text('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->enum('estado', [1,2,3])->comment('1 = activo, 2 = finalizada, 3 = cancelada');
            $table->text('objetivo');
            $table->integer('cantarticulos')->comment('cantidad de articulos esperados');
            $table->text('comentarios');   
            $table->timestamps();
        });

        Schema::create('recaudacion', function (Blueprint $table){
            $table->id();
            $table->foreignId('id_administrador')->nullable()
                                    ->constrained('administradores')
                                    ->onDelete('set null')
                                    ->onUpdate('cascade')
                                    ->comment('Clave foranea del administrador que ejecuto la accion');
            $table->foreignId('id_convocatoria')->nullable()
                                    ->constrained('convocatorias')
                                    ->onDelete('set null')
                                    ->onUpdate('cascade')
                                    ->comment('Clave foranea del administrador que ejecuto la accion');
            $table->integer('cantidad')->comment('cantidad recibida');
            $table->text('comentarios')->comment('comentarios')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recaudacion');
        Schema::dropIfExists('convocatorias');
        Schema::dropIfExists('producto_solicitado');
        Schema::dropIfExists('donacion');
        Schema::dropIfExists('convocatorias_donacion');
    }
};
