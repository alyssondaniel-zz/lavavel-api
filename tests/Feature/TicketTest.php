<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Ticket;
use App\Departament;

class TicketTest extends TestCase
{
    public function testsTicketsAreCreatedCorrectly()
    {
        $user = factory(User::class)->create();
        $departament = factory(Departament::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'title' => 'Lorem',
            'departament_id' => $departament->id,
            'created_by' => $user->id,
            'status' => 'opened',
        ];

        $this->json('POST', '/api/tickets', $payload, $headers)
            ->assertStatus(201)
            ->assertJson([
              'id' => 61,
              'title' => 'Lorem',
              'departament_id' => $departament->id,
              'created_by' => $user->id,
              'status' => 'opened',
            ]);
    }

    public function testsTicketsAreUpdatedCorrectly()
    {
        $user = factory(User::class)->create();
        $departament = factory(Departament::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $ticket = factory(Ticket::class)->create([
          'title' => 'Lorem',
          'departament_id' => $departament->id,
          'created_by' => $user->id,
          'status' => 'opened',
        ]);

        $payload = [
            'title' => 'Ipsum',
            'status' => 'processing',
        ];

        $response = $this->json('PUT', '/api/tickets/' . $ticket->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'id' => 61,
                'title' => 'Ipsum',
                'status' => 'processing',
            ]);
    }

    public function testsArtilcesAreDeletedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $ticket = factory(Ticket::class)->create([
            'status' => 'opened',
            'title' => 'Last Ticket',
        ]);

        $this->json('DELETE', '/api/tickets/' . $ticket->id, [], $headers)
            ->assertStatus(204);
    }

    public function testTicketsAreListedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/tickets', [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'status', 'title', 'departament_id', 'created_by', 'created_at', 'updated_at'],
            ]);
    }
}
