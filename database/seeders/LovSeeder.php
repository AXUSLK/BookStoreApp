<?php

namespace Database\Seeders;

use App\Models\Lov;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LovSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lov::firstOrCreate(
            [
                'id' => '1',
                'name' => 'Flat Rate',
                'lov_category_id' => '1',
            ]
        );

        Lov::firstOrCreate(
            [
                'id' => '2',
                'name' => 'Percentage',
                'lov_category_id' => '1',
            ]
        );
    }
}
