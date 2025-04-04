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
        Schema::create('capacitacion_documentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('caps_individuales_id'); 
            $table->foreign('caps_individuales_id')
            ->references('id')
            ->on('caps_individuales_id')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('dc3')->nullable();
            $table->string('reconocimiento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capacitacion_documentos');
    }
};
