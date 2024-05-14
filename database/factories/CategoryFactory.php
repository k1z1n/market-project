<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;

    public function definition()
    {
        $categories = [
            'Экшн', 'Приключения', 'Аркады', 'Доска', 'Карты', 'Казино', 'Казуальные', 'Образовательные', 'Музыка', 'Головоломки', 'Гонки', 'Ролевые игры', 'Симуляторы', 'Спорт', 'Стратегии'
        ];

        return $this->state(function (array $attributes) use ($categories) {
            return [
                'title' => $categories[$this->faker->unique()->numberBetween(0, count($categories) - 1)],
            ];
        });
    }
}
