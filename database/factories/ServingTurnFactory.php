<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ServingTurn;
use App\Models\Semester;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServingTurn>
 */
class ServingTurnFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServingTurn::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'startTime' => $this->faker->dateTime(),
            'endTime' => $this->faker->dateTime(),
            'semester_id' => Semester::factory()->create()->id,
            'descript' => $this->faker->sentence(),
            'maxSlots' => $this->faker->numberBetween(1, 100),
            'frozen' => $this->faker->boolean(),
        ];
    }
}
