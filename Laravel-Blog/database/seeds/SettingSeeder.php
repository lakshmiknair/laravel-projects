<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::Create([
            'site_name' =>'BLOG',
            'contact_email' =>'lakshmi@lorem.com',
            'contact_name'=> 'Lakshmi K Nair',
            'contact_address' =>'1300 Gemini Street, Houston, Texas - 77058',            
        ]);
    }
}
