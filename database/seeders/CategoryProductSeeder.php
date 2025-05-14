<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const MAX = 10;
    public function run(): void
    {
        for ($i = 1; $i <= self::MAX; $i++) {
            DB::table('category_product')->insert([
                [
                    'category_id' => 1,
                    'product_id' => $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
