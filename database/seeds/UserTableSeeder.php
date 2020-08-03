<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Roman',
            'email' => 'romulus.hund@gmail.com',
            'password' => bcrypt('r1234')
        ]);

    }


}
