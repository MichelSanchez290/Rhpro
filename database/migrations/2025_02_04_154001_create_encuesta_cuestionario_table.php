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
        Schema::create('encuesta_cuestionario', function (Blueprint $table) {
            $table->id(); // ID de la tabla pivote
            $table->string('encuesta_clave'); // Clave foránea hacia encuestas
            $table->unsignedBigInteger('cuestionario_id'); // Clave foránea hacia cuestionarios
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('encuesta_clave')
                ->references('Clave')
                ->on('encuestas')
                ->onDelete('cascade');

            $table->foreign('cuestionario_id')
                ->references('id')
                ->on('cuestionarios')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuesta_cuestionario');
    }
};
