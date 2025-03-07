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
        Schema::create('funciones_esp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')
                ->references('id')
                ->on( 'empresas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('sucursal_id');
            $table->foreign('sucursal_id')
                ->references('id')
                ->on( 'sucursales')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('nombre', 2000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funciones_esp');
    }
};
