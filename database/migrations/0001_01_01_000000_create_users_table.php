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
        Schema::create('users', function (Blueprint $table) {
            // Laravel
            $table->id();
            $table->string('name', 40);
            $table->string('apellido_paterno', 30);
            $table->string('apellido_materno', 30);
            $table->date('fecha_nacimiento');
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 80);
            $table->string('pais', 100);
            $table->string('estado', 100);
            $table->string('municipio', 100);
            $table->string('cp', 5);
            $table->string('direccion', 255);
            $table->enum('genero', ['M', 'F', 'O']);
            $table->string('telefono', 10);
            $table->boolean('declaracion_veracidad')->default(false);
            $table->timestamp('fecha_registro')->useCurrent();

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        // Tablas de tipos de usuarios

        // BENEFICIARIOS------------------------------------------------------------------
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')
                                ->constrained('users')
                                ->onDelete('cascade')
                                ->onUpdate('cascade')
                                ->comment('Clave foranea de usuarios');
            $table->enum('nivel_educativo', [1, 2, 3, 4])->comment('1 = Primaria, 2 = Secundaria, 3 = Preparatoria, 4 = Superior');
            $table->string('ocupacion', 100);
            $table->tinyInteger('num_dependientes')->comment('Numero de personas que dependen del usuario');
            $table->float('ingresos_mensuales')->comment('Ingresos del usuario, si no es el caso, dejar en blanco')->nullable();
            $table->timestamps();
        });
        Schema::create('contacto_emergencia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_beneficiario')->constrained('beneficiarios')->onDelete('cascade')->onUpdate('cascade')->comment('Clave foranea de beneficiarios');
            $table->string('nombre', 100);
            $table->string('relacion', 20);
            $table->string('telefono', 10);
            $table->timestamps();
        });
        // FIN BENEFICIARIOS------------------------------------------------------------------

        // TRABAJADORES ---------------------------------------------------------------------
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')
                                ->constrained('users')
                                ->onDelete('cascade')
                                ->onUpdate('cascade')
                                ->comment('Clave foranea de usuarios');
            $table->enum('estado', [1, 2, 3, 4])->comment('1 = Activo, 2 = Desactivado, 3 = Solicitado, 4 = Suspendido');
            $table->time('hora_inicio')->comment('hora de ingreso del trabajador');
            $table->time('hora_fin')->comment('hora de salida del trabajador');
            $table->timestamps();
        });


        Schema::create('administradores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_trabajador')
                                ->constrained('trabajadores')
                                ->onDelete('cascade')
                                ->onUpdate('cascade')
                                ->comment('Clave foranea de trabajadores');
            $table->timestamps();
        });
        Schema::create('coordinadores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_trabajador')
                                ->constrained('trabajadores')
                                ->onDelete('cascade')
                                ->onUpdate('cascade')
                                ->comment('Clave foranea de trabajadores');
            $table->timestamps();
        });
        Schema::create('voluntarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_trabajador')
                                ->constrained('trabajadores')
                                ->onDelete('cascade')
                                ->onUpdate('cascade')
                                ->comment('Clave foranea de trabajadores');
            $table->date('fecha_inicio')->comment('fecha de ingreso del voluntario');
            $table->date('fecha_termino')->comment('fecha de salida del voluntario');
            $table->integer('hrs_dedicadas_semana')->comment('Horas dedicadas a la semana (clases de las cuales podra)');
            $table->text('comentarios')->nullable();

            $table->timestamps();
        });

        // FIN TRABAJADORES ---------------------------------------------------------------------

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Primero eliminar tablas que dependen de 'trabajadores'
        Schema::dropIfExists('administradores');
        Schema::dropIfExists('coordinadores');
        Schema::dropIfExists('voluntarios');
        Schema::dropIfExists('trabajadores');

        // Ahora eliminar las tablas que dependen de 'users' y las demás
        Schema::dropIfExists('contacto_emergencia');
        Schema::dropIfExists('beneficiarios');

        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
