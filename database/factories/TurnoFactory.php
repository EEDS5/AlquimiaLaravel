<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Turno>
 */
class TurnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $horaEntrada = $this->faker->time();
        $horaLimite = $this->faker->time('H:i:s', '23:59:59'); // Asegúrate de que la hora límite sea posterior a la hora de entrada

        return [
            'descripcion' => 'Turno ' . $this->faker->unique()->word,
            'hora_entrada' => $horaEntrada,
            'hora_limite' => $horaLimite,
            'estado' => $this->faker->boolean,
        ];
    }
}
