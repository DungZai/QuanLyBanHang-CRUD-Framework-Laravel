<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories =[
            'Điện thoại',
            'Laptop',
            'Phụ kiện máy tính',
            'Âm thanh',
            'Màn hình',
            'Lưu trữ',
            'Phụ kiện điện thoại',
            'Thiết bị mạng',
            'Máy in',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }

        $map = [
            'Điện thoại'          => [1, 2, 3],
            'Laptop'              => [4, 5, 6],
            'Phụ kiện máy tính'   => [7, 8, 18],
            'Âm thanh'            => [9, 10, 11],
            'Màn hình'            => [12],
            'Lưu trữ'             => [13, 14],
            'Phụ kiện điện thoại' => [15, 16, 17],
            'Thiết bị mạng'       => [19],
            'Máy in'              => [20],
        ];

        foreach ($map as $name => $productId) {
            $category = Category::where('name',$name)->first();
            Product::whereIn('id',$productId)->update(['category_id' => $category->id]);
        }
    }
}
