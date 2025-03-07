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
        Schema::create('crm_contactos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('puesto');
            $table->string('correo');
            $table->string('correo2');
            $table->string('telefono');
            $table->string('telefono2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_contactos');
    }
};
