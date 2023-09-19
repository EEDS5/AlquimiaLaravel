<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Agrega esta línea de importación

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inserta registros de ejemplo en la tabla "client"
        DB::table('client')->insert([
            'fullName' => 'Nombre del Cliente 1',
            'passwordSalt' => 'salt1',
            'passwordHash' => 'hash1',
            'phone' => '1234567890',
            'email' => 'cliente1@example.com',
        ]);

        DB::table('client')->insert([
            'fullName' => 'Nombre del Cliente 2',
            'passwordSalt' => 'salt2',
            'passwordHash' => 'hash2',
            'phone' => '9876543210',
            'email' => 'cliente2@example.com',
        ]);

        // Agrega más registros según sea necesario
    }
}
