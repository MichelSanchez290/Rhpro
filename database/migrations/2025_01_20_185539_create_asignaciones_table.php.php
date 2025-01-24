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

        Schema::create('asignaciones', function(Blueprint $table){
            $table->id();
            $table->integer('realizada');
            $table->date('fecha');
            $table->unsignedBigInteger('calificador_id');
            //Declara que calificador_id es una clave foránea.
            $table->foreign('calificador_id')
                    //Indica que esta columna hace referencia a la columna id
                    ->references('id')
                    // Define que la relación es con la tabla Users
                    ->on( 'users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                    $table->unsignedBigInteger('calificado_id');
            //Declara que calificado_id es una clave foránea.
            $table->foreign('calificado_id')
                    //Indica que esta columna hace referencia a la columna id
                    ->references('id')
                    // Define que la relación es con la tabla  de Users 
                    ->on( 'users')
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
        Schema::table('asignaciones', function (Blueprint $table) {
            $table->dropForeign(['calificador_id']);
            $table->dropForeign(['calificado_id']);
        });
        Schema::dropIfExists('asignaciones');
        //
    }
};
