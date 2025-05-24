<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    const MAX = 30;
    public function run(): void
    {
        for ($i = 1; $i < self::MAX; $i++) {
            DB::table('reviews')->insert([
                [
                        'product_id' => rand(1,26),
                        'user_id' => 2,
                        'rating' => rand(1, 5),
                        'comment' => fake()->sentence(10),
                        'created_at' => now(),
                        'updated_at' => now(),
            ],
            ]);
        }
    }
}
