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
        Schema::create('nom035_levpedido', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cliente');
            $table->string('nombre_empresa');
            $table->string('giro_empresa');
            $table->string('ubicacion_empresa');
            $table->string('medio_cesrh');
            $table->string('responsable_comercial');
            $table->string('tipo_servicio');
            $table->date('fecha');
            $table->string('correo_cliente');
            $table->string('telefono_cliente');
            $table->unsignedBigInteger('leadsCli_id');
            $table->foreign('leadsCli_id')->references('id')->on('leads_clientes')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('035info_id');
            $table->foreign('035info_id')->references('id')->on('nom035_informaciones')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nom035_levpedido', function (Blueprint $table) {
            $table->dropForeign(['leadsCli_id']);
            $table->dropForeign(['users_id']);
            $table->dropForeign(['035info_id']);
        });
        Schema::dropIfExists('nom035_levpedido');
    }
};
