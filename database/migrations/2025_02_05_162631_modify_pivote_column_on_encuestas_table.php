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
        Schema::table('encuestas', function (Blueprint $table) {
            // Primero, eliminamos la columna 'Dep' si ya no la necesitamos
            $table->dropColumn('Dep');

            // Definir la clave foránea
            $table->foreign('sucursal_departament_id')
                ->references('id')
                ->on('departamento_sucursal')
                ->onDelete('set null'); // Si se elimina la relación, se establece como nulo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('encuestas', function (Blueprint $table) {
            // Si revertimos la migración, eliminamos la clave foránea
            $table->dropForeign(['sucursal_departament_id']);

            // Y eliminamos la columna 'sucursal_departament_id'
            $table->dropColumn('sucursal_departament_id');

            // Restauramos la columna 'Dep' en caso de que queramos revertir completamente
            $table->string('Dep')->nullable();
        });
    }
};
