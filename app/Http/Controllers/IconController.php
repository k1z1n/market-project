<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\ColorExtractor\Palette;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Color;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class IconController extends Controller
{
    public function createGradient(Request $request)
    {
        // Путь к иконке приложения
        $iconPath = public_path('inst.png');

        // Optimize the image
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize($iconPath);

        // Создаем экземпляр класса Palette
        $palette = Palette::fromFilename($iconPath);

        // Извлекаем цвета
        $extractor = new ColorExtractor($palette);
        $colors = $extractor->extract(5);

        // Преобразуем цвета в формат RGB
        $rgbColors = array_map(function ($color) {
            return Color::fromIntToHex($color);
        }, $colors);

        // Создаем градиент из извлеченных цветов
        $gradientCSS = "linear-gradient(to right, " . implode(', ', $rgbColors) . ")";

        // Передаем градиент в представление
        return view('icon', compact('gradientCSS'));
    }
}
