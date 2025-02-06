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
        Schema::create('servicios_especializados', function (Blueprint $table) {
            $table->id();
            $table->string('head_asesor');
            $table->string('correo');
            $table->string('telefono');
            $table->string('num_cotizacion');
            $table->date('cotizacion_emitida');
            $table->date('cotizacion_valida_hasta');
            $table->unsignedBigInteger('levantamientoPed_id');
            $table->foreign('levantamientoPed_id')
                ->references('id')
                ->on('head_levantamientos_pedidos')
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
        Schema::table('servicios_especializados', function (Blueprint $table) {
            $table->dropForeign(['levantamientoPed_id']);
        });
        Schema::dropIfExists('servicios_especializados');
    }
};