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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('Cnombre');
            $table->integer('Choras');
            $table->string('Cprecio');
            $table->string('Ctipoestatus', 45);
            $table->unsignedBigInteger('tematicas_id');
            $table->foreign('tematicas_id')
                ->references('id')
                ->on( 'tematicas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('modalidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropForeign(['tematicas_id']);
        });
        Schema::dropIfExists('cursos');
    }
};
