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
        Schema::create('nom035lev_cotizacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('levantamientoPedido035_id');
            $table->foreign('levantamientoPedido035_id')->references('id')->on('nom035_levpedido')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('cotizaciones035_id');
            $table->foreign('cotizaciones035_id')->references('id')->on('nom035_cotizaciones')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nom035lev_cotizacion', function (Blueprint $table) {
            $table->dropForeign(['levantamientoPedido035_id']);
            $table->dropForeign(['cotizaciones035_id']);
        });
        Schema::dropIfExists('nom035lev_cotizacion');
    }
};
