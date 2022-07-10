<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["name" => "Alemanha"],
            ["name" => "Argentina"],
            ["name" => "Austrália"],
            ["name" => "Brasil"],
            ["name" => "Canadá"],
            ["name" => "China"],
            ["name" => "Coreia do Sul"],
            ["name" => "Estados Unidos"],
            ["name" => "Espanha"],
            ["name" => "França"],
            ["name" => "Índia"],
            ["name" => "Grã Bretanha"],
            ["name" => "Israel"],
            ["name" => "Itália"],
            ["name" => "Japão"],
            ["name" => "México"],
            ["name" => "Noruega"],
            ["name" => "Polônia"],
            ["name" => "Portugal"],
            ["name" => "Rússia"],
            ["name" => "Suécia"],
            ["name" => 'Turquia'],
        ];

        Country::insert($data);
    }
}
