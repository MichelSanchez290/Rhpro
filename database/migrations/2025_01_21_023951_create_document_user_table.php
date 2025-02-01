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
        Schema::create('document_user', function (Blueprint $table) {
            //donde almacenara el id de la relacion
            $table->unsignedBigInteger('documento_id');
            $table->foreign('documento_id') //Declara que id es una clave foránea.
                    ->references('id') //Indica que esta columna hace referencia a la columna id
                    ->on( 'documentos')  // Define que la relación es con la tabla xxx
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            
            //donde almacenara el id de la relacion
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id') //Declara que id es una clave foránea.
                    ->references('id') //Indica que esta columna hace referencia a la columna id
                    ->on( 'users')  // Define que la relación es con la tabla xxx
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            

            $table->string('status', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar las claves foráneas explícitamente
        Schema::table('document_user', function (Blueprint $table) {
            $table->dropForeign(['documento_id']);
            $table->dropForeign(['user_id']);
        });

        
        Schema::dropIfExists('document_user');
    }
};
