<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Departament;

class DepartamentTest extends TestCase
{
    public function testsDepartamentsAreCreatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'name' => 'Lorem',
        ];

        $this->json('POST', '/api/departaments', $payload, $headers)
            ->assertStatus(201)
            ->assertJson(['id' => 4, 'name' => 'Lorem']);
    }

    public function testsDepartamentsAreUpdatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $departament = factory(Departament::class)->create([
            'name' => 'Last Departament',
        ]);

        $payload = [
            'name' => 'Lorem',
        ];

        $response = $this->json('PUT', '/api/departaments/' . $departament->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'id' => 4,
                'name' => 'Lorem',
            ]);
    }

    public function testsArtilcesAreDeletedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $departament = factory(Departament::class)->create([
            'name' => 'Last Departament',
        ]);

        $this->json('DELETE', '/api/departaments/' . $departament->id, [], $headers)
            ->assertStatus(204);
    }

    public function testDepartamentsAreListedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/departaments', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                [ 'name' => 'Atendimento ao Cliente' ],
                [ 'name' => 'Operacional' ]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'name', 'created_at', 'updated_at'],
            ]);
    }
}
