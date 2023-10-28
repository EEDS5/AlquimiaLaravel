<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Semester;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SemesterControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_can_store_multiple_semesters()
    {
        $numberOfSemesters = 5; // Cantidad de semestres a registrar

        for ($i = 1; $i <= $numberOfSemesters; $i++) {
            $data = [
                'dateStart' => '2023-0' . $i . '-01',
                'dateEnd' => '2023-0' . ($i + 1) . '-01',
                'frozen' => $i % 2 === 0 ? 1 : 0, // Simulando semestres congelados intercalados
            ];

            $response = $this->post(route('semester.store'), $data);

            $response->assertStatus(302); // Verificar redirección después del registro
            $this->assertDatabaseHas('semester', ['dateStart' => '2023-0' . $i . '-01']); // Verificar si el semestre se almacenó en la base de datos
        }
    }

    public function it_returns_semesters_index()
    {
        $response = $this->get(route('semester.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_returns_semesters_create_page()
    {
        $response = $this->get(route('semester.create'));

        $response->assertStatus(200);
    }
}
