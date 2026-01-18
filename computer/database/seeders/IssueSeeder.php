<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        // LẤY DANH SÁCH computer_id HỢP LỆ
        $computerIds = DB::table('computers')->pluck('id')->toArray();


        for ($i = 1; $i <= 50; $i++) {
            DB::table('issues')->insert([
                'computer_id'   => $faker->randomElement($computerIds),
                'reported_by'   => $faker->name(),
                'reported_date' => $faker->dateTimeBetween('-1 month', 'now'),
                'description'   => $faker->sentence(12),
                'urgency'       => $faker->randomElement(['Low', 'Medium', 'High']),
                'status'        => $faker->randomElement(['Open','In Progress','Resolved']),
                'created_at'    => now(),
                'updated_at'    => now(),              
            ]);
        }
    }
}
