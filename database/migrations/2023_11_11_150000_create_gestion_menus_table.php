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
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->foreignId('semestre_id')->constrained('semestres');
            $table->foreignId('tipo_plato_id')->constrained('tipo_platos');
            $table->foreignId('turno_id')->constrained('turnos');
            $table->foreignId('menu_ofertado_id')->constrained('menu_ofertados');
            $table->string('descripcion', 50);
            $table->string('imagen', 255)->nullable();
            $table->decimal('costo', 6, 2);
            $table->integer('total_cupo');
            $table->integer('cupo_disponible');
            $table->dateTime('fecha');
            $table->enum('estado', ['A', 'I']);
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
