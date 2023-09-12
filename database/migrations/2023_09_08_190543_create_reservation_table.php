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
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('serving_turn_id');
            $table->integer('slots');
            $table->boolean('confirmed');
            $table->datetime('confirmationEnableTime');
            $table->datetime('confirmationEndTime');
            $table->string('note', 1024)->nullable();
            $table->boolean('frozen');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('client');
            $table->foreign('serving_turn_id')->references('id')->on('serving_turn');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
