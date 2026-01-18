<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $categories = ['Technology', 'Lifestyle', 'Travel'];

        // 🔥 LẤY DANH SÁCH ID USER THẬT
        $userIds = DB::table('users')->pluck('id')->toArray();

        for ($i = 1; $i <= 30; $i++) {
            DB::table('posts')->insert([
                'user_id' => $faker->randomElement($userIds), // ✅ ĐÚNG
                'title' => $faker->sentence(6),
                'content' => $faker->paragraphs(3, true),
                'category' => $faker->randomElement($categories),
                'views' => $faker->numberBetween(0, 200),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
