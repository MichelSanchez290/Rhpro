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
            $table->text('texto');
            $table->tinyInteger('puntuacion');
            $table->unsignedBigInteger('preguntas_id');
            $table->foreign('preguntas_id')->references('id')->on('preguntas')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();   
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('respuestas', function (Blueprint $table) {
            $table->dropForeign(['preguntas_id']);
        });
        Schema::dropIfExists('respuestas');
    }
};
