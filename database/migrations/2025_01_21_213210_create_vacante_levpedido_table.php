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
        Schema::create('vacante_levpedido', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vacantes_id');
            $table->foreign('vacantes_id')
                ->references('id')
                ->on('vacantes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('headpedido_id');
            $table->foreign('headpedido_id')
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
        Schema::table('vacante_levpedido', function (Blueprint $table) {
            $table->dropForeign(['vacantes_id']);
            $table->dropForeign(['headpedido_id']);
        });
        Schema::dropIfExists('vacante_levpedido');
    }
};
