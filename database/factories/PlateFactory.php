<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Plate;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plate>
 */
class PlateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plateName' => $this->faker->word,
            'defaultPrice' => $this->faker->randomFloat(2, 0, 99.99),
            'descriptionShort' => $this->faker->text,
            'descriptionLong' => $this->faker->text,
            'frozen' => $this->faker->boolean,
        ];
    }
}
