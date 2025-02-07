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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            //donde almacenara el id de la relacion
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id') //Declara que id es una clave foránea.
                ->references('id') //Indica que esta columna hace referencia a la columna id
                ->on('empresas')  // Define que la relación es con la tabla xxx
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('sucursal_id')->nullable();
            $table->foreign('sucursal_id') //Declara que id es una clave foránea.
                ->references('id') //Indica que esta columna hace referencia a la columna id
                ->on('sucursales')  // Define que la relación es con la tabla xxx
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('tipo_user')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar las claves foráneas explícitamente
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['empresa_id']);
            $table->dropForeign(['sucursal_id']);
        });

        Schema::dropIfExists('users');
    }
};
