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
        Schema::create('crm_cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCurso');
            $table->string('modalidad');
            $table->string('participantes');
            $table->string('grupos');
            $table->string('puestosParticipar');
            $table->string('cuentanExperiencia');
            $table->string('cual');
            $table->string('objetivo');
            $table->date('fechaTentativa');
            $table->string('puestoAsignado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_cursos');
    }
};
