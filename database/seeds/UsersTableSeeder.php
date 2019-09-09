<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('toptal');
        User::create([
            'admin' => true,
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => $password,
        ]);

        factory(User::class, 10)->create();
    }
}
