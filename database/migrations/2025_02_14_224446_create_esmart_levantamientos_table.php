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
            
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('esmart_levantamientos');
    }
};
