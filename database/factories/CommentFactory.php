<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\User;
use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {

    return [
        'body' => $faker->paragraph,
        'user_id' => User::inRandomOrder()->first()->id,
        'ticket_id' => Ticket::inRandomOrder()->first(),
    ];
});
