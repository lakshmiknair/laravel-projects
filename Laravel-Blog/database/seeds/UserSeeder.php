<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::Create([
            'name' =>'admin',
            'email' =>'admin@lorem.com',
            'password'=>bcrypt('admin123'),
            'admin' =>1,
            
        ]);
        App\Profile::Create([
            'user_id' => $user->id,
            'about' =>'Loren ipsn',
            'facebook'=>'facebook.com',
            'youtube' => 'youtube.com',
            'avatar' => 'uploads/avatar/1.png'
        ]);

    }
}
