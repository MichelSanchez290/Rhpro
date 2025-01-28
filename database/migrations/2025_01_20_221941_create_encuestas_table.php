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
        Schema::create('encuestas', function (Blueprint $table) {
            $table->string('Clave')->primary(); // Definir 'Clave' como clave primaria
            $table->string('Empresa');
            $table->string('RutaLogo')->nullable();
            $table->date('FechaInicio');
            $table->date('Caducidad');
            $table->tinyInteger('Estado');
            $table->integer('NumeroEncuestas');
            $table->string('Formato');
            $table->string('EncuestasContestadas');
            $table->text('Actividades');
            $table->integer('Numero');
            $table->string('Dep');
            $table->tinyInteger('Cerrable');
            $table->string('usuariosdx035_CorreoElectronico');
            $table->date('FechaFinal')->nullable();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuestas');
    }
};
