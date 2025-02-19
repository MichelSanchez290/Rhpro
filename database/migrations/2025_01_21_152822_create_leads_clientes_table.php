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
        Schema::create('leads_clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_contacto');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('numero_cliente');
            $table->date('fecha');
            $table->string('puesto');
            $table->string('correo');
            $table->string('telefono');
            $table->string('tipo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leads_clientes', function (Blueprint $table) {
            $table->dropForeign(['users_id']);
        });
        Schema::dropIfExists('leads_clientes');
    }
};