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
        Schema::create('employee_privilege', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('privilege_level', 16);
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employee');
        });

        // Agrega la restricción CHECK después de crear la tabla
        DB::statement('ALTER TABLE employee_privilege ADD CONSTRAINT PrivilegeLevel CHECK (privilege_level IN ("table", "register", "kitchen", "admin"))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_privilege');
    }
};
