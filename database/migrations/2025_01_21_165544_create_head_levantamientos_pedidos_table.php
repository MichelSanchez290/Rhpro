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
        Schema::create('head_levantamientos_pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('responsable_comercial');
            $table->date('fecha');
            $table->string('nombre_cliente');
            $table->string('puesto');
            $table->string('empresa');
            $table->string('ubicacion_empresa');
            $table->string('tamano_empresa');
            $table->string('primera_vez_o_recompra');
            $table->string('medio_cesrh');
            $table->string('numero_vacantes');
            $table->string('operativas');
            $table->string('especializadas');
            $table->string('ejecutivas');
            $table->string('correo_cliente');
            $table->string('telefono');
            $table->string('status');
            $table->unsignedBigInteger('leadCli_id');
            $table->foreign('leadCli_id')
                ->references('id')
                ->on('leads_clientes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            // $table->unsignedBigInteger('users_id');
            // $table->foreign('users_id')->references('users_id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('head_levantamientos_pedidos', function (Blueprint $table) {
            $table->dropForeign(['leadCli_id']);
            // $table->dropForeign(['users_id']);
        });
        Schema::dropIfExists('head_levantamientos_pedidos');
    }
};