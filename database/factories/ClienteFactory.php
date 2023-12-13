<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => \App\Models\Persona::inRandomOrder()->first()->id, // Asume que las Personas están previamente creadas
            'razon_social' => $this->faker->optional()->company,
            'nit' => $this->faker->optional()->numerify('#########'),
        ];
    }
}
