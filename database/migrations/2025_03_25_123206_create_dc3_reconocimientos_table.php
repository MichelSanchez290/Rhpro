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
        Schema::create('dc3_reconocimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grupocursos_capacitaciones_id'); // Definir la columna antes de la clave foránea
            $table->foreign('grupocursos_capacitaciones_id')
                ->references('id')
                ->on('grupocursos_capacitaciones')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('dc3')->nullable();
            $table->string('reconocimiento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dc3_reconocimientos'); // Solo necesitas eliminar la tabla, Laravel borra automáticamente las claves foráneas
    }
};
