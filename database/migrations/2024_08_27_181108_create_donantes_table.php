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
            $table->id();
            $table->string('payer_id')->comment('id de cuenta paypal');
            $table->string('email');
            $table->enum('Tipo_Donante', ['Individual', 'Corporativo', 'Organizacion', 'Anonimo']);
            $table->string('first_name', 50);
            $table->string('last_name', 70);
            $table->string('country_code', 10);
            $table->timestamps();

            $table->unique('payer_id');
            
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
