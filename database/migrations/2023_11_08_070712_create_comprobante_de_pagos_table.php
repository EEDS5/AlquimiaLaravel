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
        Schema::create('comprobante_de_pagos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->decimal('pago_total', 7, 2);
            $table->char('tipo_pago', 1);
            $table->foreignId('pago_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprobante_de_pagos');
    }
};
