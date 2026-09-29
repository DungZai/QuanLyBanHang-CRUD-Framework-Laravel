<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $products =[
            ['name' => 'iPhone 15 Pro Max 256GB', 'price' => 29990000, 'quantity' => 25, 'status' => true],
            ['name' => 'Samsung Galaxy S24 Ultra', 'price' => 27490000, 'quantity' => 30, 'status' => true],
            ['name' => 'Xiaomi Redmi Note 13', 'price' => 5490000, 'quantity' => 80, 'status' => true],
            ['name' => 'Laptop Dell Inspiron 15', 'price' => 15900000, 'quantity' => 15, 'status' => true],
            ['name' => 'Laptop ASUS Vivobook 14', 'price' => 13500000, 'quantity' => 20, 'status' => true],
            ['name' => 'MacBook Air M2 13 inch', 'price' => 26990000, 'quantity' => 12, 'status' => true],
            ['name' => 'Chuột Logitech M331', 'price' => 320000, 'quantity' => 150, 'status' => true],
            ['name' => 'Bàn phím cơ Keychron K2', 'price' => 1890000, 'quantity' => 45, 'status' => true],
            ['name' => 'Tai nghe AirPods Pro 2', 'price' => 5990000, 'quantity' => 40, 'status' => true],
            ['name' => 'Tai nghe Sony WH-1000XM5', 'price' => 7490000, 'quantity' => 18, 'status' => true],
            ['name' => 'Loa Bluetooth JBL Flip 6', 'price' => 2790000, 'quantity' => 60, 'status' => true],
            ['name' => 'Màn hình LG 24 inch Full HD', 'price' => 2990000, 'quantity' => 35, 'status' => true],
            ['name' => 'Ổ cứng SSD Samsung 970 EVO 500GB', 'price' => 1650000, 'quantity' => 70, 'status' => true],
            ['name' => 'USB Kingston 64GB', 'price' => 150000, 'quantity' => 200, 'status' => true],
            ['name' => 'Sạc nhanh Anker 65W', 'price' => 690000, 'quantity' => 90, 'status' => true],
            ['name' => 'Cáp sạc Type-C 1m', 'price' => 120000, 'quantity' => 300, 'status' => true],
            ['name' => 'Ốp lưng iPhone 15 Pro', 'price' => 250000, 'quantity' => 120, 'status' => true],
            ['name' => 'Webcam Logitech C920', 'price' => 1590000, 'quantity' => 25, 'status' => false],
            ['name' => 'Router WiFi TP-Link Archer C6', 'price' => 850000, 'quantity' => 0, 'status' => false],
            ['name' => 'Máy in Canon LBP 2900', 'price' => 3200000, 'quantity' => 5, 'status' => false],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
