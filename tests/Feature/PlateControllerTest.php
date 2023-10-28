<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Plate;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PlateControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_can_store_multiple_plates()
    {
        $numberOfPlates = 10; // Cantidad de platos a registrar

        for ($i = 1; $i <= $numberOfPlates; $i++) {
            $data = [
                'plateName' => 'Plate ' . $i,
                'defaultPrice' => 10.99 * $i, // Precio base simulado
                'descriptionShort' => 'Short description for Plate ' . $i,
                'descriptionLong' => 'Long description for Plate ' . $i,
                'frozen' => $i % 2 === 0 ? 1 : 0, // Simulando platos congelados intercalados
            ];

            $response = $this->post(route('plate.store'), $data);

            $response->assertStatus(302); // Verificar redirección después del registro
            $this->assertDatabaseHas('plate', ['plateName' => 'Plate ' . $i]); // Verificar si el plato se almacenó en la base de datos
        }
    }

    public function it_returns_plates_index()
    {
        $response = $this->get(route('plate.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_returns_plates_create_page()
    {
        $response = $this->get(route('plate.create'));

        $response->assertStatus(200);
    }
}
