<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Client;
use Database\Factories\ClientFactory;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_can_store_multiple_clients()
    {
        $numberOfClients = 20; // Cantidad de clientes a registrar

        for ($i = 1; $i <= $numberOfClients; $i++) {
            $data = [
                'fullName' => 'John Doe ' . $i,
                'passwordSalt' => 'salt123' . $i,
                'passwordHash' => 'hash123' . $i,
                'phone' => '123456789' . $i,
                'email' => 'john' . $i . '@example.com',
            ];

            $response = $this->post(route('client.store'), $data);

            $response->assertStatus(302); // Verificar redirección después del registro
            $this->assertDatabaseHas('client', ['fullName' => 'John Doe ' . $i]); // Verificar si el cliente se almacenó en la base de datos
        }
    }

    public function it_returns_clients_index()
    {
        $response = $this->get(route('client.index'));

        $response->assertStatus(200);
    }

    public function it_returns_clients_create_page()
    {
        $response = $this->get(route('client.create'));

        $response->assertStatus(200);
    }
}
