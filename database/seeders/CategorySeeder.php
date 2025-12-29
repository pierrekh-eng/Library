<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories=[
            ['name'=>'Laravel'],
            ['name'=>'Medecine'],
            ['name'=>'Farming'],
        ];
        Category::insert($categories);
                /*with factory */
        // Category::factory(15)->create();
    }
}
