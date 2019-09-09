<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Ticket;
use App\Departament;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        Comment::truncate();
        Ticket::truncate();
        User::truncate();
        Departament::truncate();
        DB::statement("SET foreign_key_checks = 1");

        $this->call(UsersTableSeeder::class);
        $this->call(DepartamentsTableSeeder::class);
        $this->call(TicketsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
