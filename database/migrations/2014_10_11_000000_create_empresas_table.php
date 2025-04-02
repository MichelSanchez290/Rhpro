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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->text('razon_social');
            $table->string('rfc', 14);
            $table->text('nombre_comercial');
            $table->string('pais_origen', 45);
            $table->string('representante_legal', 255);
            $table->text('url_constancia_situacion_fiscal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
