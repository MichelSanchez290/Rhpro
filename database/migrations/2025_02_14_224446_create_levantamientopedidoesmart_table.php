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
        Schema::create('levantamientopedidoesmart', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cliente');
            $table->string('nombre_empresa');
            $table->string('giro_empresa');
            $table->string('ubicacion_empresa');
            $table->string('tamaño_empresa');
            $table->string('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levantamientopedidoesmart');
    }
};
