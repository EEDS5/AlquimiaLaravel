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
        Schema::create('plate', function (Blueprint $table) {
            $table->id();
            $table->string('plateName', 128);
            $table->decimal('defaultPrice', 16, 2);
            $table->string('descriptionShort', 256)->nullable();
            $table->string('descriptionLong', 1024)->nullable();
            $table->boolean('frozen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plate');
    }
};
