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
            $table->foreignId('gestion_menu_id')->constrained()->onDelete('cascade');
            $table->foreignId('bebida_id')->constrained()->onDelete('cascade');
            $table->integer('cantidad');
            $table->primary(['gestion_menu_id', 'bebida_id']);
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
