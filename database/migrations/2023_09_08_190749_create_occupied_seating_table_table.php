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
        Schema::create('occupied_seating_table', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seating_table_id');
            $table->unsignedBigInteger('reservation_id');
            $table->timestamps();

            $table->foreign('seating_table_id')->references('id')->on('seating_table');
            $table->foreign('reservation_id')->references('id')->on('reservation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('occupied_seating_table');
    }
};
