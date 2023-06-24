<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user__1 = User::create([
            'id' => '2',
            'first_name' => 'Sachin',
            'last_name' => 'Kavindu',
            'email' => 'sachin@gmail.lk',
            'password' => bcrypt('sachin@123'),
            'email_verified_at' => Carbon::now(),
        ]);

        $user__2 = User::create([
            'id' => '3',
            'first_name' => 'Sandew',
            'last_name' => 'Dullewa',
            'email' => 'sandew@gmail.lk',
            'password' => bcrypt('sandew@123'),
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
