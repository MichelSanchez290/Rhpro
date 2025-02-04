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
        Schema::create('crm_empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tamano_empresa');
            $table->string('pagina_web');
            $table->string('logotipo', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_empresas');
    }
};