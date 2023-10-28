<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\ServingTurn;
use App\Models\Semester;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ServingTurnControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    /**public function it_can_store_multiple_serving_turns()
    {
        $numberOfTurns = 5; // Cantidad de turnos a registrar

        for ($i = 1; $i <= $numberOfTurns; $i++) {
            $data = [
                'startTime' => '08:00:00',
                'endTime' => '17:00:00',
                'semester_id' => Semester::inRandomOrder()->first()->id, // Selecciona un semestre aleatorio
                'descript' => 'Serving Turn ' . $i,
                'maxSlots' => 50,
                'frozen' => $i % 2 === 0 ? 1 : 0, // Simula turnos congelados intercalados
            ];

            $response = $this->post(route('servingturn.store'), $data);

            $response->assertStatus(302); // Verificar redirección después del registro
            $this->assertDatabaseHas('serving_turn', ['descript' => 'Serving Turn ' . $i]); // Verificar si el turno se almacenó en la base de datos
        }
    }*/
    public function it_returns_serving_turns_index()
    {
        $response = $this->get(route('servingturn.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_returns_serving_turns_create_page()
    {
        $semesters = Semester::factory()->count(2)->create(); // Crear algunos semestres de ejemplo

        $response = $this->get(route('servingturn.create'));

        $response->assertStatus(200);
    }
}
