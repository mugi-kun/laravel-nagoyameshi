<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_names = [
            '和食', '海鮮', '肉', '居酒屋', '洋食', 'パスタ',
            '中華料理', '韓国料理', 'ラーメン', 'カレー', 
            'カフェ', 'スイーツ' 
        ];

        foreach ($category_names as $category_name) {
            Category::create([
                'name' => $category_name,
                'description' => $category_name
            ]);
        }

    }
}
