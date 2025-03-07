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
        Schema::create('nom035_informaciones', function (Blueprint $table) {
            $table->id();
            $table->string('cuantos_participantes');
            $table->string('cuantos_centros_trabajo');
            $table->string('primera_vez');
            $table->string('integral_o_software');
            $table->string('inspeccion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nom035_informaciones');
    }
};
