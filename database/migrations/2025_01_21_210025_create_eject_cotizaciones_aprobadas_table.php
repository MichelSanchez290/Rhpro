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
        Schema::create('eject_cotizaciones_aprobadas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_aprobacion');
            $table->string('correo_enviado');
            $table->unsignedBigInteger('serviEjec_id');
            $table->foreign('serviEjec_id')
                ->references('id')
                ->on('servicios_ejecutivos')
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
        Schema::table('eject_cotizaciones_aprobadas', function (Blueprint $table) {
            $table->dropForeign(['serviEjec_id']);
        });
        Schema::dropIfExists('eject_cotizaciones_aprobadas');
    }
};
