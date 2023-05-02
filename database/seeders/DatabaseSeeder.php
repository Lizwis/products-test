<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            'Clothing', 'Garden', 'Kitchen', 'Bedroom'
        ];

        foreach ($data as $category) {
            Category::create([
                'name' => $category
            ]);
        }

        \App\Models\Product::factory(10)->create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('products_categories')->insert(
                [
                    'products_id' => $i,
                    'categories_id' => rand(1, 4)
                ]
            );
        }

        \App\Models\User::factory(1)->create();
    }
}
