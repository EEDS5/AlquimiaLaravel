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
        Schema::create('payment_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservation_id');
            $table->string('payment_method', 32);
            $table->string('billing_name', 128);
            $table->string('billing_nit', 64);
            $table->timestamps();

            $table->foreign('reservation_id')->references('id')->on('reservation');
        });

        // Agregar la restricción de verificación después de crear la tabla
        DB::statement("ALTER TABLE payment_info ADD CONSTRAINT PaymentMethod CHECK (payment_method IN ('cash', 'card', 'qr'))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_info');
    }
};
