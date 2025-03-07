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
        Schema::create('contacto_leadsclientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contactos_id');
            $table->foreign('contactos_id')
                ->references('id')
                ->on('crm_contactos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('leadCli_id');
            $table->foreign('leadCli_id')
                ->references('id')
                ->on('leads_clientes')
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
        Schema::table('contacto_leadscliente', function (Blueprint $table) {
            $table->dropForeign(['contactos_id']);
            $table->dropForeign(['leadCli_id']);
        });
        Schema::dropIfExists('contacto_leadscliente');
    }
};
