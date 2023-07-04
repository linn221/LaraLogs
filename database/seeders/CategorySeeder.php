<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Frontend', 'Backend', 'Server'];
        $categores_array = [];
        foreach($categories as $category) {
            $categores_array[] = [
                'name' => $category
            ];
        }
        Category::insert($categores_array);
        //
    }
}
