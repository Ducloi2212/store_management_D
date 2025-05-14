<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Điện thoại',
                'status' => 'still',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 2,
                'name' => 'Máy tính',
                'status' => 'still',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 3,
                'name' => 'Smart Watch',
                'status' => 'still',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 4,
                'name' => 'Tai nghe',
                'status' => 'still',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 5,
                'name' => 'Phụ kiện',
                'status' => 'still',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}