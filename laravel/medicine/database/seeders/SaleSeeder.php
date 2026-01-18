<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $medicineIds = DB::table('medicines')->pluck('id')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->randomElement($medicineIds), 
                'quantity' => $faker->numberBetween(1, 10),
                'sale_date' => $faker->dateTimeThisYear(),
                'customer_phone' => $faker->optional()->numerify('0#########'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
