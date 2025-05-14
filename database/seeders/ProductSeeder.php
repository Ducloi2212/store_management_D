<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'iphone 12 Pro Max',
                'price' => 11999000,
                'quantity' => 20,
                'description' => 'Thiết kế sang trọng, hiệu năng mạnh mẽ, camera chất lượng cao.',
                'image' => 'images/products/phone/ip12pm.jpg',
                'status' => 'still',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 2,
                'name' => 'iPhone 13',
                'price' => 19999000,
                'quantity' => 15,
                'description' => 'Thiết kế sang trọng, hiệu năng mạnh mẽ, camera chất lượng cao.',
                'image' => 'images/products/phone/iphone13.jpg',
                'status' => 'still',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 3,
                'name' => 'iPhone 14 Pro Max',
                'price' => 28999000,
                'quantity' => 10,
                'description' => 'Màn hình OLED sắc nét, hiệu suất tuyệt vời, pin bền bỉ.',
                'image' => 'images/products/phone/iphone14promax.jpg',
                'status' => 'still',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'iPhone 11 Pro Max',
                'price' => 10999000,
                'quantity' => 10,
                'description' => 'Màn hình OLED sắc nét, hiệu suất tuyệt vời, pin bền bỉ.',
                'image' => 'images/products/phone/iphone11promax.jpg',
                'status' => 'still',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'iPhone 11',
                'price' =>6999000,
                'quantity' => 10,
                'description' => 'Màn hình OLED sắc nét, hiệu suất tuyệt vời, pin bền bỉ.',
                'image' => 'images/products/phone/iphone11.jpg',
                'status' => 'still',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'iPhone 15 Pro Max',
                'price' => 25999000,
                'quantity' => 12,
                'description' => 'Màn hình OLED sắc nét, hiệu suất tuyệt vời, pin bền bỉ.',
                'image' => 'images/products/phone/iphone15promax.jpg',
                'status' => 'still',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'iPhone 16 Pro Max',
                'price' => 27999000,
                'quantity' => 11,
                'description' => 'Màn hình OLED sắc nét, hiệu suất tuyệt vời, pin bền bỉ.',
                'image' => 'images/products/phone/iphone16promax.jpg',
                'status' => 'still',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' =>8,
                'name' => 'iPhone 12 Pro',
                'price' => 12999000,
                'quantity' => 20,
                'description' => 'Màn hình OLED sắc nét, hiệu suất tuyệt vời, pin bền bỉ.',
                'image' => 'images/products/phone/iphone12pro.jpg',
                'status' => 'still',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' =>9,
                'name' => 'iPhone 12',
                'price' => 10999000,
                'quantity' => 16,
                'description' => 'Màn hình OLED sắc nét, hiệu suất tuyệt vời, pin bền bỉ.',
                'image' => 'images/products/phone/iphone12.jpg',
                'status' => 'still',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'name' => 'iPhone 16',
                'price' => 20699000,
                'quantity' => 10,
                'description' => 'Màn hình OLED sắc nét, hiệu suất tuyệt vời, pin bền bỉ.',
                'image' => 'images/products/phone/iphone16.jpg',
                'status' => 'still',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}