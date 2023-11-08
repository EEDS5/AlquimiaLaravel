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
        Schema::create('empleado_turnos', function (Blueprint $table) {
            $table->foreignId('empleado_id')->constrained()->onDelete('cascade');
            $table->foreignId('turno_id')->constrained()->onDelete('cascade');
            $table->primary(['empleado_id', 'turno_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_turnos');
    }
};
