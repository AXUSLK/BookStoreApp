<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Children',
                'slug' => 'children',
                'image' => '/assets/images/categories/1.jpg',
                'status' => 1
            ],
            [
                'name' => 'Fiction',
                'slug' => 'fiction',
                'image' => '/assets/images/categories/2.jpg',
                'status' => 1
            ],
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'image' => '/assets/images/categories/3.jpg',
                'status' => 1
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
