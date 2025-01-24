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
        Schema::create('grupocursos_capacitaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombreGrupo', 45);
            $table->date('fechaIni');
            $table->date('fechaFin');
            $table->unsignedBigInteger('cursos_id');
            $table->foreign('cursos_id')
                ->references('id')
                ->on( 'cursos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('objetivo_capacitacion', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grupocursos_capacitaciones', function (Blueprint $table) {
            $table->dropForeign(['cursos_id']);
        });
        Schema::dropIfExists('grupocursos_capacitaciones');
    }
};
