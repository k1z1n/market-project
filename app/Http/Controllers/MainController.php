<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function mainView()
    {
        $applications = Application::where('type_id', $this->typeName('Приложение'))
            ->take(8)
            ->where('status', 'Активна')
            ->withAvg('feedbacks', 'stars') // Загружаем среднюю оценку
            ->get();

        $games = Application::where('type_id', $this->typeName('Игра'))
            ->take(8)
            ->where('status', 'Активна')
            ->withAvg('feedbacks', 'stars') // Загружаем среднюю оценку
            ->get();

        $banners = Banner::all()->sortBy('sequence');

        $categories = Category::with(['applications' => function ($query) {
            $query->whereNotNull('banner_image');
        }])
            ->whereHas('applications', function ($query) {
                $query->whereNotNull('banner_image');
            })
            ->withCount(['applications' => function ($query) {
                $query->whereNotNull('banner_image');
            }])
            ->orderBy('applications_count', 'desc')
            ->take(4)
            ->get();

        $featuredApps = [];
        foreach ($categories as $category) {
            $featuredApp = $category->applications()
                ->whereNotNull('banner_image')
                ->where('status', 'Активна')
                ->orderBy('download_count', 'desc')
                ->first();

            if ($featuredApp) {
                $featuredApps[] = $featuredApp;
            }
        }

        return view('main', compact('applications', 'games', 'banners', 'featuredApps', 'categories'));
    }


    private function typeName($title)
    {
        return Type::where('title', $title)->pluck('id')->first();
    }
}
