<?php

use Illuminate\Database\Seeder;
use App\Departament;

class DepartamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Departament::class, 1)->create([
          'name' => 'Atendimento ao Cliente'
        ]);

        factory(Departament::class, 1)->create([
          'name' => 'Operacional'
        ]);

        factory(Departament::class, 1)->create([
          'name' => 'Produtos'
        ]);
    }
}
