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
            $table->id(); // Clave primaria autoincremental
            $table->string('Clave')->unique(); // Clave única generada automáticamente
            $table->string('Empresa'); // Nombre de la empresa
            $table->unsignedBigInteger('sucursal_departament_id')->nullable(); // Relación con sucursal y departamento
            $table->string('RutaLogo')->nullable(); // Ruta del logo (opcional)
            $table->date('FechaInicio'); // Fecha de inicio
            $table->date('FechaFinal')->nullable(); // Fecha de finalización
            $table->date('Caducidad')->nullable(); // Fecha de caducidad
            $table->tinyInteger('Estado')->default(0); // Estado de la encuesta (0 = inactiva, 1 = activa)
            $table->integer('NumeroEncuestas'); // Número de encuestas
            $table->json('Formato')->nullable(); // Formato de la encuesta en JSON
            $table->integer('EncuestasContestadas')->default(0); // Número de encuestas contestadas (inicia en 0)
            $table->text('Actividades')->nullable(); // Actividades relacionadas
            $table->integer('Numero')->nullable(); // Número de encuesta
            $table->string('Dep')->nullable(); // Departamento
            $table->tinyInteger('Cerrable')->default(1); // Si la encuesta se puede cerrar (1 = sí, 0 = no)
            $table->string('usuariosdx035_CorreoElectronico')->nullable(); // Correo del usuario creador
            $table->timestamps(); // Campos created_at y updated_at
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
