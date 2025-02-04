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
        Schema::create('cursotra_levpeditra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cursos_id');
            $table->foreign('cursos_id')
                ->references('id')
                ->on('crm_cursos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('levpeditra_id');
            $table->foreign('levpeditra_id')
                ->references('id')
                ->on('training_levantamientos')
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
        Schema::table('cursotra_levpeditra', function (Blueprint $table) {
            $table->dropForeign(['cursos_id']);
            $table->dropForeign(['levpeditra_id']);
        });
        Schema::dropIfExists('cursotra_levpeditra');
    }
};
