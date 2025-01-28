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
        Schema::create('datos_fiscales', function (Blueprint $table) {
            $table->id();
            $table->string('razonSocial');
            $table->string('rfc');
            $table->string('calle');
            $table->string('numeroExterior');
            $table->string('numeroInterior');
            $table->string('colonia');
            $table->string('municipio');
            $table->string('localidad');
            $table->string('estado');
            $table->string('pais');
            $table->string('codigoPostal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_fiscales');
    }
};

