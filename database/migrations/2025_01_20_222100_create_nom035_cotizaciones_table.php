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
        Schema::create('nom035_cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->string('asesor');
            $table->string('correo');
            $table->string('telefono');
            $table->string('clinombre');
            $table->string('clipuesto');
            $table->string('cliempresa');
            $table->string('clicorreo');
            $table->string('clitelefono');
            $table->string('noCoti');
            $table->date('fechaCoti');
            $table->date('fechaVigencia');
            $table->string('servicio');
            $table->string('modalidad');
            $table->string('asesoria');
            $table->string('trabajadores');
            $table->string('vacaciones');
            $table->string('preciouni');
            $table->string('precioSinIva');
            $table->string('cotizacionesNom035');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nom035_cotizaciones');
    }
};
