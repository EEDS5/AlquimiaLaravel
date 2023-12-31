<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoPlato>
 */
class TipoPlatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word, // Genera una palabra
            'descripcion' => $this->faker->optional()->sentence, // Genera una frase (opcional)
            'estado' => $this->faker->boolean, // Genera un valor booleano aleatorio
        ];
    }
}
