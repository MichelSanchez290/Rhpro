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
        Schema::create('head_levantamiento_pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_servicio');
            $table->date('fecha');
            $table->time('hora');
            $table->decimal('total_vacantes');
            $table->decimal('operativos');
            $table->decimal('especializados');
            $table->decimal('ejecutivos');
            $table->decimal('numero_pedido');
            $table->foreignId('leads_clientes_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('servicios_especializados_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('servicios_operativos_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('servicios_ejecutivos_id')
                ->constrained()
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
        Schema::table('head_levantamiento_pedidos', function (Blueprint $table) {
            $table->dropColumn('leads_clientes_id');
            $table->dropColumn('servicios_especializados_id');
            $table->dropColumn('servicios_operativos_id');
            $table->dropColumn('servicios_ejecutivos_id');
        });
        Schema::dropIfExists('head_levantamiento_pedidos');
    }
};