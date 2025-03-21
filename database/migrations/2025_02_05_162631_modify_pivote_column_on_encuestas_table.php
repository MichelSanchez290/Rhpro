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
            // Verificar si la columna 'Dep' existe antes de eliminarla
            if (Schema::hasColumn('encuestas', 'Dep')) {
                $table->dropColumn('Dep');
            }

            // Verificar si la columna 'sucursal_departament_id' ya existe antes de agregarla
            if (!Schema::hasColumn('encuestas', 'sucursal_departament_id')) {
                $table->unsignedBigInteger('sucursal_departament_id')->nullable();

                // Definir la clave foránea
                $table->foreign('sucursal_departament_id')
                    ->references('id')
                    ->on('sucursal_departament')
                    ->onDelete('set null'); // Si se elimina la relación, se establece como nulo
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('encuestas', function (Blueprint $table) {
            // Si revertimos la migración, eliminamos la clave foránea
            if (Schema::hasColumn('encuestas', 'sucursal_departament_id')) {
                $table->dropForeign(['sucursal_departament_id']);
                $table->dropColumn('sucursal_departament_id');
            }

            // Restauramos la columna 'Dep' en caso de que queramos revertir completamente
            if (!Schema::hasColumn('encuestas', 'Dep')) {
                $table->string('Dep')->nullable();
            }
        });
    }
};
