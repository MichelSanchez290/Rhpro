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
        Schema::create('trabajadores_encuestas', function (Blueprint $table) {
            $table->id();
            $table->string('Avance');
            $table->string('Clave');
            $table->foreign('Clave')
                ->references('Clave')
                ->on('encuestas')
                ->onDelete('cascade');
            $table->date('fecha_fin_encuesta');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });

        // Añadir índice en la columna 'Clave' después de la creación de la tabla
        Schema::table('trabajadores_encuestas', function (Blueprint $table) {
            $table->index('Clave');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trabajadores_encuestas', function (Blueprint $table) {
            $table->dropForeign(['Clave']);
            $table->dropForeign(['users_id']);
            $table->dropIndex(['Clave']);
        });
        Schema::dropIfExists('trabajadores_encuestas');
    }
};
