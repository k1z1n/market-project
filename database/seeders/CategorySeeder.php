<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Экшн', 'Приключения', 'Аркады', 'Доска', 'Карты', 'Казино', 'Казуальные', 'Образовательные', 'Музыка', 'Головоломки', 'Гонки', 'Ролевые игры', 'Симуляторы', 'Спорт', 'Стратегии'
        ];

        foreach ($categories as $category) {
            Category::create(['title' => $category]);
        }
    }
}
