<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Mobile Legend',],
            ['name' => 'Free Fire',],
            ['name' => 'PlayerUnknowns Battlegrounds',],
        ];

        Category::insert($categories);

    }
}
