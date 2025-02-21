<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('esmart_levantamientos', function (Blueprint $table) {

            $table->id(); // Clave primaria

            $table->date('fecha');
            $table->time('hora');
            $table->string('numero_pedido');
            $table->foreignId('users_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::table('esmart_levantamientos', function (Blueprint $table) {
            $table->dropColumn('users_id');
        });
        Schema::dropIfExists('esmart_levantamientos');
    }
};
