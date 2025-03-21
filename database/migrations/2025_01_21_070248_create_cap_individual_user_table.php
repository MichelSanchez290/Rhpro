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
        Schema::create('cap_individual_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('caps_individuales_id');
            $table->foreign('caps_individuales_id')
                ->references('id')
                ->on( 'caps_individuales')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')
                ->references('id')
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
        Schema::table('cap_individual_user', function (Blueprint $table){
            $table->dropForeign(['users_id']);
            $table->dropForeign(['caps_individuales_id']);
        });
        Schema::dropIfExists('cap_individual_user');
    }
};
