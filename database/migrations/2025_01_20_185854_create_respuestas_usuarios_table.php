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
        Schema::create('respuestas_usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('respuestas_id');
            $table->unsignedBigInteger('asignaciones_id');
            $table->foreign('respuestas_id')->references('id')->on('respuestas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('asignaciones_id')->references('id')->on('asignaciones')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('respuestas_usuarios', function (Blueprint $table) {
            $table->dropForeign(['respuestas_id']);
            $table->dropForeign(['asignaciones_id']);
        });
        Schema::dropIfExists('respuestas_usuarios');


    }
};
