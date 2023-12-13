<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo_persona_id' => \App\Models\TipoPersona::inRandomOrder()->first()->id, // Asume que los TipoPersonas están previamente creados
            'ci' => $this->faker->unique()->numerify('######'), // Genera un número de cédula único
            'nombre' => $this->faker->firstName,
            'apellido_p' => $this->faker->lastName,
            'apellido_m' => $this->faker->lastName,
            'telefono' => $this->faker->unique()->phoneNumber,
            'direccion' => $this->faker->optional()->address,
            'email' => $this->faker->unique()->safeEmail,
            'estado' => $this->faker->boolean,
        ];
    }
}
