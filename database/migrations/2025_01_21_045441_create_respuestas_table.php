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
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id();
            $table->string('ValorRespuesta');
            $table->unsignedBigInteger('preguntasbases_id');
            $table->foreign('preguntasbases_id')
                ->references('id')
                ->on('preguntas_bases')
                ->onDelete('cascade');
            $table->unsignedBigInteger('trabajadores_encuestas_id');
            $table->foreign('trabajadores_encuestas_id')
                ->references('id')
                ->on('trabajadores_encuestas')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('respuestas', function (Blueprint $table) {
            $table->dropForeign(['preguntasbases_id']);
            $table->dropForeign(['trabajadores_encuestas_id']);
        });
        Schema::dropIfExists('respuestas');
    }
};
