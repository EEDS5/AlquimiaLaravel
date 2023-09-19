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
        Schema::create('serving_turn', function (Blueprint $table) {
        $table->id();
        $table->datetime('startTime');
        $table->datetime('endTime');
        $table->unsignedBigInteger('semester_id')->nullable(); // Permitido que sea nulo
        $table->string('descript', 1024)->nullable();
        $table->integer('maxSlots');
        $table->boolean('frozen');
        $table->timestamps();
        
        $table->foreign('semester_id')->references('id')->on('semester');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serving_turn');
    }
};
