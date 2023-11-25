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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->foreignId('persona_id')->constrained('personas');
            $table->foreignId('gestion_menu_id')->nullable()->constrained('gestion_menus');
            $table->foreignId('entrada_id')->nullable()->constrained('entradas');
            $table->foreignId('pago_id')->nullable()->constrained('pagos');
            $table->date('fecha');
            $table->decimal('monto', 7, 2);
            $table->integer('cantidad_cupo');
            $table->enum('estado', ['A', 'P', 'C']);
            $table->timestamps();
        });               
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
