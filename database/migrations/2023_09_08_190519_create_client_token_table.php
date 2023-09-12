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
        Schema::create('client_token', function (Blueprint $table) {
            $table->char('id', 64);
            $table->datetime('expiration');
            $table->unsignedBigInteger('client_id');
            $table->timestamps();

            $table->primary('id');
            $table->foreign('client_id')->references('id')->on('client');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_token');
    }
};
