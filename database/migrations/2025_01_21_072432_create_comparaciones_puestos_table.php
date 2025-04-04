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
        Schema::create('comparaciones_puestos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_comparacion');
            $table->string('competencias_requeridas');
            $table->string('nivel_actual')->nullable();
            $table->string('nivel_nuevo')->nullable();
            $table->string('diferencia');
            $table->unsignedBigInteger('puesto_nuevo');
            $table->foreign('puesto_nuevo')
                ->references('id')
                ->on('perfiles_puestos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('perfiles_puestos_id');
            $table->foreign('perfiles_puestos_id')
                ->references('id')
                ->on('perfiles_puestos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('capacitacion_asignada')->default(false);
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')
                    ->references('id')
                    ->on( 'users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comparaciones_puestos', function (Blueprint $table) {
            $table->dropForeign(['perfiles_puestos_id']);
        });
        Schema::table('evaluciones', function (Blueprint $table){
            $table->dropForeign(['users_id']);
        });

        Schema::dropIfExists('comparaciones_puestos');
    }
};
