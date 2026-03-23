<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $items = [
            '商品のお届けについて', 
            '商品の交換について', 
            '商品トラブル', 
            'ショップへの問い合わせ',
            'その他'
            ];

        foreach ($items as $item) {
            Category::firstOrCreate(['content' => $item]);
            }
    }
}
