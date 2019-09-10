<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Comment;
use App\Ticket;

class CommentTest extends TestCase
{
    public function testsCommentsAreCreatedCorrectly()
    {
        $user = factory(User::class)->create();
        $ticket = factory(Ticket::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'user_id' => $user->id,
            'ticket_id' => $ticket->id,
            'body' => 'Lorem',
        ];

        $this->json('POST', '/api/comments', $payload, $headers)
            ->assertStatus(201)
            ->assertJson([
              'id' => 16,
              'user_id' => $user->id,
              'ticket_id' => $ticket->id,
              'body' => 'Lorem'
            ]);
    }

    public function testsCommentsAreUpdatedCorrectly()
    {
        $user = factory(User::class)->create();
        $ticket = factory(Ticket::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $comment = factory(Comment::class)->create([
            'user_id' => $user->id,
            'ticket_id' => $ticket->id,
            'body' => 'Last Comment',
        ]);

        $payload = [
            'body' => 'Lorem',
        ];

        $response = $this->json('PUT', '/api/comments/' . $comment->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'id' => 16,
                'user_id' => $user->id,
                'ticket_id' => $ticket->id,
                'body' => 'Lorem',
            ]);
    }

    public function testsArtilcesAreDeletedCorrectly()
    {
        $user = factory(User::class)->create();
        $ticket = factory(Ticket::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $comment = factory(Comment::class)->create([
            'user_id' => $user->id,
            'ticket_id' => $ticket->id,
            'body' => 'Last Comment',
        ]);

        $this->json('DELETE', '/api/comments/' . $comment->id, [], $headers)
            ->assertStatus(204);
    }

    public function testCommentsAreListedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/comments', [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'user_id', 'ticket_id', 'body', 'created_at', 'updated_at'],
            ]);
    }
}
