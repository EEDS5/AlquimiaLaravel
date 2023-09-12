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
        Schema::create('cooking_job', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('occupied_seating_table_id');
            $table->datetime('expected_completion_time');
            $table->timestamps();

            $table->foreign('occupied_seating_table_id')->references('id')->on('occupied_seating_table');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cooking_job');
    }
};
