<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CreateAdminUserSeeder::class,
            LovCategorySeeder::class,
            LovSeeder::class,
            CategoriesSeeder::class,
            ProductsSeeder::class,
            CouponSeeder::class,
        ]);
    }
}
