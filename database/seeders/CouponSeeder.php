<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Coupon::factory()->count(5)->create();

        $coupons =   [
            [
                'code' => 'FvkL87',
                'status' => 1,
                'discount' => 12,
                'discount_type' => 2,
                'created_by' => 1,
                'updated_by' => 1,
            ]
        ];

        foreach ($coupons as $coupon) {
            Coupon::create($coupon);
        }
    }
}
