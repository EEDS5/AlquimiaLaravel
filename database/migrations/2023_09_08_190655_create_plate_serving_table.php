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
        Schema::create('plate_serving', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plate_id');
            $table->unsignedBigInteger('menu_id');
            $table->integer('slots');
            $table->decimal('price', 16, 2);
            $table->timestamps();

            $table->foreign('plate_id')->references('id')->on('plate');
            $table->foreign('menu_id')->references('id')->on('menu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plate_serving');
    }
};
