<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();

        return [
            'code' => $faker->unique()->word,
            'status' => $faker->boolean(100),
            'discount' => $faker->randomFloat(2, 0, 100),
            'discount_type' => $faker->randomElement(['1', '2']),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
