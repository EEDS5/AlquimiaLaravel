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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary();
            $table->string('username', 50)->unique();
            $table->string('contraseña', 255);
            $table->boolean('estado');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('personas');
        });        
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
