<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Ação'],
            ['name' => 'Adulto'],
            ['name' => 'Animação'],
            ['name' => 'Aventura'],
            ['name' => 'Biografia'],
            ['name' => 'Comédia'],
            ['name' => 'Crime'],
            ['name' => 'Documentário'],
            ['name' => 'Drama'],
            ['name' => 'Esporte'],
            ['name' => 'Família'],
            ['name' => 'Fantasia'],
            ['name' => 'Faroeste'],
            ['name' => 'Ficção Científica'],
            ['name' => 'Film Noir'],
            ['name' => 'Guerra'],
            ['name' => 'Histórico'],
            ['name' => 'Mistério'],
            ['name' => 'Musical'],
            ['name' => 'Policial'],
            ['name' => 'Romance'],
            ['name' => 'Suspense'],
            ['name' => 'Terror'],
            ['name' => 'Thriller']
        ];

        Category::insert($data);
    }
}
