<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'user_id' => 2,
                'name' => 'user',
                'phone' => '0123456789',
                'address' => '123 Đường ABC, TP XYZ',
                'email' => 'user@gmail.com',
                'note' => 'Giao hàng giờ hành chính',
                'status' => 'pending',
                'total' => 199000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}