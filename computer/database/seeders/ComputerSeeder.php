<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 50; $i++) {
            DB::table('computers')->insert([
                'computer_name' => 'May'. $faker ->bothify('Lab1-PC##'),            
                'model'   => $faker->randomElement(['Dell', 'HP', 'Asus', 'Acer', 'Lenovo']),
                'operating_system'  => $faker->randomElement(['Windows 10', 'Windows 11', 'Ubuntu']),
                'processor'         => $faker->randomElement(['Core i3', 'Core i5', 'Core i7', 'Ryzen 5']),
                'memory'            => $faker->randomElement([4, 8, 16, 32]),
                'available'         => $faker->boolean(80), // 80% còn hoạt động
                'created_at'        => now(),
                'updated_at'        => now(),              
            ]);
        }
    }
}
