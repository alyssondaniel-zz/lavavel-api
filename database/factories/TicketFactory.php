<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use App\User;
use App\Departament;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'created_by' => User::inRandomOrder()->first()->id,
        'departament_id' => Departament::inRandomOrder()->first()->id,
    ];
});
