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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('serving_turn_id');
            $table->string('menuDescription', 1024);
            $table->boolean('isOpen');
            $table->timestamps();

            $table->foreign('serving_turn_id')->references('id')->on('serving_turn');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
