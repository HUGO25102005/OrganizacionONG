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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donacion');
    }
};
