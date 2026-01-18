<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('medicines')->insert([
                'name' => $faker->word(),
                'brand' => $faker->randomElement(['Pfizer', 'Bayer', 'GSK', null]),
                'dosage' => $faker->randomElement(['10mg', '20mg', '100mg', '250mg']),
                'form' => $faker->randomElement(['Tablet', 'Capsule', 'Syrup']),
                'price' => $faker->randomFloat(2, 5, 200),
                'stock' => $faker->numberBetween(10, 500),
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
