<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([

            'name' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@lorem.com',
            'admin' =>1,
            'avatar' =>asset('avatars/avatar.png')

        ]);
        App\User::create([

            'name' => 'Lakshmi',
            'password' => bcrypt('admin'),
            'email' => 'lakshmi@lorem.com',
           
            'avatar' =>asset('avatars/avatar.png')

        ]);
    }
}
