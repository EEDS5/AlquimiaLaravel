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
        Schema::create('gestion_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->nullable()->constrained()->onDelete('set null');
            $table->string('descripcion', 50);
            $table->decimal('costo', 6, 2);
            $table->integer('total_cupo');
            $table->integer('cupo_disponible');
            $table->dateTime('fecha');
            $table->char('estado', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestion_menus');
    }
};
