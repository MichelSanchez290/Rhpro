<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nom035_levpedidos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_servicio');
            $table->date('fecha');
            $table->time('hora');

            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('nom035_levpedidos');
    }
};
