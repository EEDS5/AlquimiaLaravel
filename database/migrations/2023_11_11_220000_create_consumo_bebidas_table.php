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
        Schema::create('consumo_bebidas', function (Blueprint $table) {
            $table->foreignId('bebida_ofertada_id')->constrained('bebida_ofertadas');
            $table->foreignId('pago_id')->constrained('pagos');
            $table->integer('cantidad');
            $table->decimal('precio', 7, 2);
            $table->primary(['bebida_ofertada_id', 'pago_id']);
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumo_bebidas');
    }
};
