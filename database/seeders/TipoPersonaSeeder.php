<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoPersona;
class TipoEmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = ['cliente', 'empleado - cajero', 'empleado - cocinero', 'empleado - mesero'];

        foreach ($tipos as $tipo) {
            TipoPersona::create(['descripcion' => $tipo]);
        }
    }
}
