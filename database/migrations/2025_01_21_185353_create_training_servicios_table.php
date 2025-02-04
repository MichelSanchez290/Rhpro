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
        Schema::create('training_servicios', function (Blueprint $table) {
            $table->id();
            $table->string('asesor');
            $table->string('asesor_correo');
            $table->string('asesor_telefono');
            $table->string('numero_cotizacion');
            $table->string('cotizacion_emitida');
            $table->date('fin_cotizacion_valida');
            $table->unsignedBigInteger('levantrainin_id');
            $table->foreign('levantrainin_id')
                ->references('id')
                ->on('training_levantamientos')
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
        Schema::table('training_servicios', function (Blueprint $table) {
            $table->dropForeign(['levantrainin_id']);
        });
        Schema::dropIfExists('training_servicios');
    }
};
