<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();

        $name = Str::ucfirst($faker->unique()->words(3, true));
        $slug = Str::slug($name, '-');

        return [
            'name' => $name,
            'description' => $faker->paragraph,
            'slug' => $slug,
            'price' => $faker->numberBetween(500, 3000),
            'thumb_image' => $faker->imageUrl(640, 480, 'Book'),
            'main_image' => $faker->imageUrl(1280, 720, 'Book'),
            'status' => $faker->boolean(85),
            'category_id' => $faker->numberBetween(1, 3),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
