<?php

use Illuminate\Database\Seeder;
use LaravelForum\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channels=Channel::create([
            'name'=>'Laravel 5.8',
            'slug'=>str_slug('Laravel 5.8')
        ]);
        $channels=Channel::create([
            'name'=>'Vuejs 3',
            'slug'=>str_slug('Vuejs 3')
        ]);
        $channels=Channel::create([
            'name'=>'Angular 7',
            'slug'=>str_slug('Angular 7')
        ]);
        $channels=Channel::create([
            'name'=>'Nodejs',
            'slug'=>str_slug('Nodejs')
        ]);
        
    }
}
