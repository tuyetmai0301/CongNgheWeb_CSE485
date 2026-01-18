<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RestaurantSeeder extends Seeder
{ 
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i = 1; $i <= 3; $i++) {
            DB::table('restaurants')->insert([
                'restaurant_name' => $faker->company,
                'cuisine_type' => $faker->randomElement(['Asian', 'Italian', 'American']),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

