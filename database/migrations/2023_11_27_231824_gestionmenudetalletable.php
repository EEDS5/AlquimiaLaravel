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
        Schema::create('gestion_menu_de_talles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gestion_menu_id');
            $table->unsignedBigInteger('menu_ofertado_id');
            $table->foreign('gestion_menu_id')->references('id')->on('gestion_menus');
            $table->foreign('menu_ofertado_id')->references('id')->on('menu_ofertados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestionmenudetalle');
    }
};
