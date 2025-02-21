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
            $table->foreignId('nom035_informaciones_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('users_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
        
    }
    public function down(): void
    {
        Schema::table('nom035_levpedidos', function (Blueprint $table) {
            $table->dropColumn('nom035_informaciones_id');
            $table->dropColumn('users_id');
        });
        Schema::dropIfExists('nom035_levpedidos');
    }
};
