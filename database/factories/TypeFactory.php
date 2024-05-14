<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
 */
class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Type::class;

    public function definition()
    {
        $types = ['Приложение', 'Игра'];

        return $this->state(function (array $attributes) use ($types) {
            return [
                'title' => $types[$this->faker->unique()->numberBetween(0, count($types) - 1)],
            ];
        });
    }
}
