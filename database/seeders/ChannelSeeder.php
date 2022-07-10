<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Netflix'],
            ['name' => 'Prime Vídeo'],
            ['name' => 'Globoplay'],
            ['name' => 'HBO Max'],
            ['name' => 'Disney+'],
            ['name' => 'Star+'],
            ['name' => 'Apple TV+'],
            ['name' => 'Youtube'],
            ['name' => 'Pluto TV'],
            ['name' => 'Oldflix'],
            ['name' => 'DVD Blu-ray'],
        ];

        Channel::insert($data);
    }
}
