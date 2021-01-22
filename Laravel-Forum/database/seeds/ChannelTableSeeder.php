<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Channel;
class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Laravel', 'slug' => Str::slug('Laravel') ];
        $channel2 = ['title' => 'Vuejs', 'slug' => Str::slug('Vuejs') ];
        $channel3 = ['title' => 'Javascript', 'slug' => Str::slug('Javascript') ];
        $channel4 = ['title' => 'CSS3', 'slug' => Str::slug('CSS3')];
        $channel5 = ['title' => 'PHP Testing', 'slug' => Str::slug('PHP Testing')];
        $channel6 = ['title' => 'Spark', 'slug' => Str::slug('Spark')];
        $channel7 = ['title' => 'Lumen', 'slug' => Str::slug('Lumen')];
        $channel8 = ['title' => 'Forge', 'slug' =>  Str::slug('Forge')];

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);

    }
}
