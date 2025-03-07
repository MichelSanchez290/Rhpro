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
        Schema::create('escaneardcs', function (Blueprint $table) {
            $table->id();
            $table->string('urlEsca');
            $table->unsignedBigInteger('grupocursos_capacitaciones_id');
            $table->foreign('grupocursos_capacitaciones_id')
                ->references('id')
                ->on( 'grupocursos_capacitaciones')
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
        Schema::table('escaneardcs', function (Blueprint $table) {
            $table->dropForeign(['grupocursos_capacitaciones_id']);
        });
        Schema::dropIfExists('escaneardcs');
    }
};
