<?php

use Illuminate\Database\Seeder;
use App\Ticket;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Ticket::class, 10)->create([
        'status' => 'opened'
      ]);
      factory(Ticket::class, 15)->create([
        'status' => 'processing'
      ]);
      factory(Ticket::class, 35)->create([
        'status' => 'closed'
      ]);
    }
}
