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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_persona_id')->constrained('tipo_personas');
            $table->string('ci', 30)->unique();
            $table->string('nombre', 60);
            $table->string('apellido_p', 30);
            $table->string('apellido_m', 30);
            $table->string('telefono', 30)->unique()->nullable();
            $table->string('direccion', 50)->nullable();
            $table->string('email', 30)->unique();
            $table->boolean('estado');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
