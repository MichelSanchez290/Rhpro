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
        Schema::create('360_encuestas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->text('descripcion');
            $table->string('indicaciones', 2000);
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('360_encuestas');
    }
};
