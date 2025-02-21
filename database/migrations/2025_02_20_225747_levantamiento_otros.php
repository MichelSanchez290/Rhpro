<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {   
        Schema::create('levantamiento_otros', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('cantidad');
            $table->string('tipo_necesidades');
            $table->date('fecha_tentativa');
            $table->decimal('presupuesto');
            $table->unsignedBigInteger('tipo_servicios_id');
            $table->foreign('tipo_servicios_id')
                ->references('id')
                ->on('tipo_servicios')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('levantamiento_otros', function (Blueprint $table) {
            $table->dropColumn(['tipo_servicios_id']);
        });
        Schema::dropIfExists('levantamiento_otros');
    }
};
