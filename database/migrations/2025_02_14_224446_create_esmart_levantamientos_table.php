<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('esmart_levantamientos', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('nombre_cliente', 255);
            $table->string('nombre_empresa', 255);
            $table->string('giro_empresa', 255);
            $table->string('ubicacion_empresa', 255);
            $table->string('tamaño_empresa', 45);
            $table->string('primera_o_recompra', 45);
            $table->string('medio_cesrh', 255);
            $table->string('responsable_comercial', 255);
            $table->date('fecha');
            $table->string('correo_cliente', 255);
            $table->string('telefono_cliente', 10);
            $table->unsignedBigInteger('leadcliente_id');
            $table->unsignedBigInteger('users_id');

            // Claves foráneas (ajusta según tus necesidades)
            $table->foreign('leadcliente_id')->references('id')->on('leads_clientes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('esmart_levantamientos', function (Blueprint $table) {
            $table->dropForeign(['leadcliente_id']);
            $table->dropForeign(['users_id']);
        });
        Schema::dropIfExists('esmart_levantamientos');
    }
};
