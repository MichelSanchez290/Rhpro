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
        Schema::create('cotizaciones_aprobadas_nom', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_aprobacion');
            $table->string('email_enviado');
            $table->unsignedBigInteger('nom035cotizaciones_id');
            $table->foreign('nom035cotizaciones_id')
                ->references('id')
                ->on('nom035_cotizaciones')
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
        Schema::table('cotizaciones_aprobadas_nom', function (Blueprint $table) {
            $table->dropForeign(['nom035cotizaciones_id ']);
        });
        Schema::dropIfExists('cotizaciones_aprobadas_nom');
    }
};
