<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plato>
 */
class PlatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->words(2, true), // Genera un nombre de dos palabras
            'imagen' => $this->faker->optional()->imageUrl(), // Genera una URL de imagen aleatoria, opcional
            'descripcion' => $this->faker->optional()->sentence(), // Genera una descripción corta, opcional
            'estado' => $this->faker->boolean(), // Genera un valor booleano aleatorio
        ];
    }
}
