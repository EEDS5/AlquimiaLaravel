<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Semestre>
 */
class SemestreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fechaInicio = $this->faker->date();
        $fechaFinal = $this->faker->date('Y-m-d', '2023-12-31'); // Asegúrate de que la fecha final sea posterior a la fecha de inicio

        return [
            'nombre' => 'Semestre ' . $this->faker->unique()->word,
            'fecha_inicio' => $fechaInicio,
            'fecha_final' => $fechaFinal,
            'estado' => $this->faker->boolean,
        ];
    }
}
