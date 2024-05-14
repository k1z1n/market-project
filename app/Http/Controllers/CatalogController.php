<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function catalogView()
    {
        $categories = Category::all();
        $types = Type::all();
        $applications = Application::withAvg('feedbacks', 'stars')->get();
        return view('catalog', compact('applications', 'categories', 'types'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('query');

        if (!empty($searchQuery)) {
            $applications = Application::withAvg('feedbacks', 'stars')
                ->where('title', 'like', '%' . $searchQuery . '%')
                ->get();
        } else {
            $applications = Application::withAvg('feedbacks', 'stars')->get();
        }

        $categories = Category::all();
        $types = Type::all();

        return view('catalog', compact('applications', 'categories', 'types'));
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

    protected function saveSearchQuery($query)
    {
        $searchHistory = cache()->get('search_history', []);

        array_unshift($searchHistory, $query);

        $searchHistory = array_slice($searchHistory, 0, 5);

        cache()->put('search_history', $searchHistory);
    }

    public function getSearchHistory()
    {
        $searchHistory = cache()->get('search_history', []);

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

    public function compilationCategoryView($id){
        $applications = Application::where('category_id', $id)->withAvg('feedbacks', 'stars')->get();
        $category = Category::findOrFail($id);
        $categoryName = $category->title;
        $mostDownloadedApplication = Application::where('category_id', $id)
            ->orderBy('download_count', 'desc')
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
