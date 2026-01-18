<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        // LẤY DANH SÁCH computer_id HỢP LỆ
        $restaurantIds = DB::table('restaurants')->pluck('id')->toArray();
        for ($i = 1; $i <= 15; $i++) {
            DB::table('menu_items')->insert([
                'restaurant_id' => $faker->randomElement($restaurantIds),
                'dish_name' => $faker->words(2, true),
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 5, 50),
                'availability' => $faker->randomElement(['Available', 'Out of Stock']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
