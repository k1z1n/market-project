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

        $applications = Application::withAvg('feedbacks', 'stars');
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
        $applications = Application::withAvg('feedbacks', 'stars')->where('type_id', $id)->get();
        return view('catalog', compact('applications', 'categories', 'types'));
    }

    public function index(Request $request, $types = null)
    {
        $searchQuery = $request->input('search');

        if ($searchQuery) {
            $applications = Application::where('title', 'like', '%' . $searchQuery . '%')->get();
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
                ->where('title', 'like', '%' . $searchQuery . '%')
                ->get();

            $this->saveSearchQuery($searchQuery);
        } else {
            $applications = Application::withAvg('feedbacks', 'stars')->get();
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
        $categories = Category::withCount('applications')
            ->orderBy('applications_count', 'desc')
            ->get();

        $featuredApps = [];
        foreach ($categories as $category) {
            $featuredApp = $category->applications()
                ->orderBy('download_count', 'desc')
                ->first();

            if ($featuredApp) {
                $featuredApps[] = $featuredApp;
            }
        }

        return view('slider', compact('categories', 'featuredApps'));
    }

    public function compilationCategoryView($id)
    {
        $applications = Application::where('category_id', $id)->withAvg('feedbacks', 'stars')->get();
        $category = Category::findOrFail($id);
        $categoryName = $category->title;

//        // Получаем приложение с максимальным количеством скачиваний в категории
//        $mostDownloadedApplication = Application::where('category_id', $id)
//            ->orderBy('download_count', 'desc')
//            ->first();

        // Если нет приложений с положительным количеством скачиваний, баннер берется из первого приложения в категории
//        if (!$mostDownloadedApplication || $mostDownloadedApplication->download_count <= 0) {
        $mostDownloadedApplication = Application::where('category_id', $id)
            ->first();
//        }

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
            $applications->orderBy($sort);
        }

        if ($category) {
            $applications->where('category_id', $category);
        }

        if ($type) {
            $applications->where('type_id', $type);
        }

        $filteredApplications = $applications->get();

        return response()->json($filteredApplications);
    }
}
