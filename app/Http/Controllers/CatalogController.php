<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CatalogController extends Controller
{
    public function catalogView(Request $request)
    {
        $categories = Category::all();
        $types = Type::all();

        $applications = Application::withAvg('feedbacks', 'stars')->where('status', 'Активна');
        if ($request->has('category') && $request->category !== 'all') {
            $applications->where('category_id', $request->category);
        }

        if ($request->has('type') && $request->type !== 'all') {
            $applications->where('type_id', $request->type);
        }
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'title_asc':
                    $applications->orderBy('title', 'asc');
                    break;
                case 'title_desc':
                    $applications->orderBy('title', 'desc');
                    break;
                case 'download_count_asc':
                    $applications->orderBy('download_count', 'asc');
                    break;
                case 'download_count_desc':
                    $applications->orderBy('download_count', 'desc');
                    break;
                case 'feedbacks_count_asc':
                    $applications->orderBy('feedbacks_count', 'asc');
                    break;
                case 'feedbacks_count_desc':
                    $applications->orderBy('feedbacks_count', 'desc');
                    break;
            }
        }

        $applications = $applications->get();
        if (isset(request()->sort) or isset(request()->category) or isset(request()->type)) {
            return view('catalog', compact('applications', 'categories', 'types', 'request'));
        }
        return view('catalog', compact('categories', 'types', 'applications'));
    }

    public function catalogViewType($id)
    {
        $categories = Category::all();
        $types = Type::all();

        $applications = Application::withAvg('feedbacks', 'stars')->where('type_id', $id)->where('status', 'Активна')->get();

        if ($applications->isEmpty()) {
            abort(404, 'Приложения для данного типа не найдены');
        }

        return view('catalog', compact('applications', 'categories', 'types'));
    }

    public function index(Request $request, $types = null)
    {
        $searchQuery = $request->input('search');

        if ($searchQuery) {
            $applications = Application::where('title', 'like', '%' . $searchQuery . '%')->where('status', 'Активна')->get();
            $this->saveSearchQuery($searchQuery);
        } else {
            if ($types) {
                $applications = Application::getCatalog($types);
            } else {
                $apps = Application::all();
                return redirect()->route('catalog', compact('apps'));
            }
        }

        return view('catalog', compact('applications'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('query');

        if (!empty($searchQuery)) {
            $applications = Application::withAvg('feedbacks', 'stars')
                ->where('status', 'Активна')
                ->where('title', 'like', '%' . $searchQuery . '%')
                ->get();

            $this->saveSearchQuery($searchQuery);
        } else {
            $applications = Application::withAvg('feedbacks', 'stars')->where('status', 'Активна')->get();
        }

        $categories = Category::all();
        $types = Type::all();

        return view('catalog', compact('applications', 'categories', 'types'));
    }

    protected function saveSearchQuery($query)
    {
        $searchHistory = Cache::get('search_history', []);

        $searchHistory = array_filter($searchHistory, function ($item) use ($query) {
            return $item !== $query;
        });

        array_unshift($searchHistory, $query);

        $searchHistory = array_slice($searchHistory, 0, 5);

        Cache::put('search_history', $searchHistory);
    }

    public function getSearchHistory()
    {
        $searchHistory = Cache::get('search_history', []);

        return response()->json($searchHistory);
    }

    public function compilationView()
    {
        // Получаем категории с подсчетом количества приложений
        $categories = Category::withCount('applications')
            ->orderBy('applications_count', 'desc')
            ->get();

        $featuredApps = [];
        $filteredCategories = [];

        // Фильтруем категории и создаем массивы категорий и их популярных приложений
        foreach ($categories as $category) {
            $featuredApp = $category->applications()
                ->orderBy('download_count', 'desc')
                ->where('status', 'Активна')
                ->first();

            if ($featuredApp) {
                $filteredCategories[] = $category;
                $featuredApps[] = $featuredApp;
            }
        }

        return view('slider', compact('filteredCategories', 'featuredApps'));
    }

    public function compilationCategoryView($id)
    {
        $applications = Application::where('category_id', $id)->withAvg('feedbacks', 'stars')->where('status', 'Активна')->get();

        $category = Category::findOrFail($id);

        if ($applications->isEmpty()) {
            abort(404, 'Приложения для данной категории не найдены');
        }

        $categoryName = $category->title;

        $mostDownloadedApplication = Application::where('category_id', $id)->where('status', 'Активна')
            ->first();

        $mostDownloadedBanner = $mostDownloadedApplication->banner_image;

        return view('compilation', compact('applications', 'categoryName', 'mostDownloadedBanner'));
    }



    public function filter(Request $request)
    {
        $sort = $request->input('sort');
        $category = $request->input('category');
        $type = $request->input('type');

        // Query the applications based on the filter parameters
        $applications = Application::query();

        if ($sort) {
            $applications->orderBy($sort)->where('status', 'Активна');
        }

        if ($category) {
            $applications->where('category_id', $category)->where('status', 'Активна');
        }

        if ($type) {
            $applications->where('type_id', $type)->where('status', 'Активна');
        }

        $filteredApplications = $applications->get();

        return response()->json($filteredApplications);
    }
}
