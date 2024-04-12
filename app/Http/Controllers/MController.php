<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Jonasarts\GetImageColors\GetImageColors;

class MController extends Controller
{
    public function createBackground(Request $request)
    {
        // Путь к изображению
        $imagePath = public_path('path/to/your/image.jpg');

        // Используем библиотеку для извлечения цветов
        $colors = GetImageColors::get($imagePath, 5);

        // Выбираем средний цвет из извлеченных
        $averageColor = collect($colors)->sortBy('pixels')->last()['color'];

        // Передаем цвет и путь к изображению в представление
        return view('image', [
            'backgroundColor' => $averageColor,
            'imagePath' => 'path/to/your/image.jpg',
        ]);
    }
}
