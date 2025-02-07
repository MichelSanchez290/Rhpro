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
        Schema::create('datos_fiscales', function (Blueprint $table) {
            $table->id();
            $table->string('razonSocial');
            $table->string('rfc');
            $table->string('calle');
            $table->string('numeroExterior');
            $table->string('numeroInterior')->nullable();
            $table->string('colonia');
            $table->string('municipio');
            $table->string('localidad');
            $table->string('estado');
            $table->string('pais');
            $table->string('codigoPostal');
            $table->unsignedBigInteger('crmEmpresas_id');
            $table->foreign('crmEmpresas_id')
                ->references('id')
                ->on('crm_empresas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('datos_fiscales', function (Blueprint $table) {
            $table->dropForeign(['crmEmpresas_id']);
        });
        Schema::dropIfExists('datos_fiscales');
    }
};