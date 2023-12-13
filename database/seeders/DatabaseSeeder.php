<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Crea 10 platos
        \App\Models\Plato::factory(10)->create();

        // Crea 10 categorías
        \App\Models\Categoria::factory(10)->create();

        // Crea 10 menús
        \App\Models\Menu::factory(10)->create(); 

        // Crea 10 tipos de platos
        \App\Models\TipoPlato::factory(10)->create(); 

        // Crea tipos de personas
        $this->call(TipoPersonaSeeder::class);

        // Crea 20 personas
        \App\Models\Persona::factory(20)->create();

        // Crea 10 clientes
        \App\Models\Cliente::factory(10)->create();
    }
}