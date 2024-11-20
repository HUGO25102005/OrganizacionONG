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
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto', 10, 2);
            $table->text('porque');
            $table->timestamps();
        });
        
        Schema::create('programas_educativos', function (Blueprint $table) {
            
            $table->id();
            $table->foreignId('id_voluntario')
                            ->nullable()
                            ->constrained('voluntarios')
                            ->onDelete('set null')
                            ->onUpdate('cascade')
                            ->comment('Clave foranea de voluntario');
            $table->string('nombre_programa', 255);
            $table->text('descripcion');
            $table->text('objetivos');
            $table->string('publico_objetivo', 255);
            $table->integer('duracion');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->text('recursos_necesarios');
/*             $table->enum('tipo', [1,2])->comment('1 = Presencial, 2 = Virtual'); */
            $table->enum('estado', [1,2,3,4,5,6])->comment('1 = Solicitado(coordinador y admin), 2 = En Revision(Actividades (cordinador)), 3 = Aprovado, 4 = activo, 5 = terminado, 6 = Cancelado');
            $table->text('resultados_esperados');
            $table->foreignId('id_presupuesto')
                                ->constrained('presupuestos')
                                ->onDelete('cascade')
                                ->onUpdate('cascade')
                                ->comment('Clave foranea de presupuesto');
            $table->integer('beneficiarios_estimados')->nullable();
            $table->text('indicadores_cumplimiento')->nullable();
            $table->text('comentarios_adicionales')->nullable();
            $table->timestamp('fecha_registro')->useCurrent();

            $table->timestamps();
        });

        Schema::create('aprobacion_contenidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_programa_educativo')
                                ->constrained('programas_educativos')
                                ->onDelete('cascade')
                                ->onUpdate('cascade')
                                ->comment('Clave foranea de programas_educativos');
            $table->foreignId('id_coordinador')
                                ->constrained('coordinadores')
                                ->onDelete('cascade')
                                ->onUpdate('cascade')
                                ->comment('Clave foranea de programas_educativos');
            $table->boolean('si_no');
            $table->timestamps();
        });
        Schema::create('aprobacion_presupuestos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_presupuesto')
                                ->constrained('presupuestos')
                                ->onDelete('cascade')
                                ->onUpdate('cascade')
                                ->comment('Clave foranea de programas_educativos');
            $table->foreignId('id_administrador')
                                ->constrained('administradores')
                                ->onDelete('cascade')
                                ->onUpdate('cascade')
                                ->comment('Clave foranea de programas_educativos');
            $table->boolean('si_no');
            $table->timestamps();
        });
        Schema::create('salones_clases', function (Blueprint $table) {
            $table->foreignId('id_programa_educativo')
                                ->constrained('programas_educativos')
                                ->onDelete('cascade')
                                ->onUpdate('cascade')
                                ->comment('Clave foranea de programas_educativos');
            $table->foreignId('id_beneficiarios')
                                ->constrained('beneficiarios')
                                ->onDelete('cascade')
                                ->onUpdate('cascade')->comment('Clave foranea de programas_educativos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    /**
 * Reverse the migrations.
 */
public function down(): void
{
    // Elimina primero las tablas que dependen de programas_educativos
    Schema::dropIfExists('salones_clases');
    Schema::dropIfExists('aprobacion_contenidos');
    Schema::dropIfExists('aprobacion_presupuestos');
    
    // Luego elimina programas_educativos y presupuestos
    Schema::dropIfExists('programas_educativos');
    Schema::dropIfExists('presupuestos');
}

};
