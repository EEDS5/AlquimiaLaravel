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
        Schema::create('bebida_ofertadas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gestion_menu_id')->constrained('gestion_menus');
            $table->foreignId('bebida_id')->constrained('bebidas');
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bebida_ofertadas');
    }
};
