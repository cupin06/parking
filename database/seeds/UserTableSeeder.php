<?php

use Illuminate\Database\Seeder;
use Pocket\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jeevan',
            'email' => 'jeevan@pocketpixel.com',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
        ]);
    }
}
