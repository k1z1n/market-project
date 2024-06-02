<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Developer;
use App\Models\Download;
use App\Models\Feedback;
use App\Models\StatisticVisit;
use App\Models\Type;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{

//    Страницы админки
    public function mainView()
    {
        $totalVisitCount = StatisticVisit::sum('count');
        $totalUsers = User::count();
        $totalDeveloper = Developer::count();
        $totalDownloads = Application::sum('download_count');
        $weeklyVisits = StatisticVisit::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->get()
            ->map(function ($visit) {
                // Получаем день недели из даты
                $visit->dayOfWeek = Carbon::parse($visit->date)->dayName;
                return $visit;
            });

        // Получаем статистику за сегодня
        $dailyVisits = StatisticVisit::where('date', Carbon::now()->toDateString())->first();

        return view('admin.main', compact('weeklyVisits', 'dailyVisits', 'totalVisitCount', 'totalUsers', 'totalDeveloper', 'totalDownloads'));
    }

    public function typesView()
    {
        $total = Type::count();
        $types = Type::paginate(10);
        return view('admin.types-table', compact('types', 'total'));
    }

    public function categoriesView()
    {
        $total = Category::count();
        $categories = Category::paginate(10);
        return view('admin.categories-table', compact('categories', 'total'));
    }

    public function applicationsView()
    {
        $total = Application::count();
        $applications = Application::paginate(10);
        return view('admin.applications-table', compact('applications', 'total'));
    }

    public function usersView()
    {
        $total = User::count();
        $users = User::paginate(10);
        return view('admin.users-table', compact('users', 'total'));
    }

    public function developersView()
    {
        $total = Developer::count();
        $developers = Developer::paginate(10);
        return view('admin.developers-table', compact('developers', 'total',));
    }

//    Действия для приложений
    public function searchApplications(Request $request)
    {
        $total = Application::count();
        $searchTerm = $request->input('search');
        $applicationQuery = Application::query();

        if ($searchTerm) {
            $applicationQuery->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('id', 'like', '%' . $searchTerm);
//                    ->orWhere('email', 'like', '%' . $searchTerm . '%');
            });
        }

        $applications = $applicationQuery->paginate(10)->withQueryString();
        $count = $applications->total();

        return view('admin.applications-table', compact('applications', 'count', 'total'));
    }

    public function oneApplicationView($id)
    {
        $application = Application::findOrFail($id);
        return view('admin.one-application', compact('application'));
    }

//    Действия для разработчика

    public function searchDevelopers(Request $request)
    {
        $total = Developer::count();
        $searchTerm = $request->input('search');
        $developerQuery = Developer::query();

        if ($searchTerm) {
            $developerQuery->where(function ($query) use ($searchTerm) {
                $query->where('username', 'like', '%' . $searchTerm . '%')
                    ->orWhere('id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $searchTerm . '%');
            });
        }

        $developers = $developerQuery->paginate(10)->withQueryString();
        $count = $developers->total();
        return view('admin.developers-table', compact('developers', 'count', 'total'));
    }


    // Действия для пользователя

    public function searchUsers(Request $request)
    {
        $total = User::all()->count();
        $searchTerm = $request->input('search');
        $usersQuery = User::query();

        if ($searchTerm) {
            $usersQuery->where(function ($query) use ($searchTerm) {
                $query->where('username', 'like', '%' . $searchTerm . '%')
                    ->orWhere('id', 'like', '%' . $searchTerm)
                    ->orWhere('email', 'like', '%' . $searchTerm . '%');
            });
        }

        $users = $usersQuery->paginate(10)->withQueryString();
        $count = $users->total();
        dd($count);
        return view('admin.users-table', compact('users', 'count', 'total'));
    }

    public function updateBlockedStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->blocked = $request->blocked;
        $user->save();

        return redirect()->back()->with('success', 'Пользователь успешно заблокирован/разблокирован!');
    }

    public function updateStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = $request->status;
        $user->save();

        return redirect()->back()->with('success', 'Статус пользователя успешно обновлен!');
    }

    //    Действия над категориями
    public function searchCategories(Request $request)
    {
        $total = Category::count();
        $searchTerm = $request->input('search');
        $usersQuery = Category::query();

        if ($searchTerm) {
            $usersQuery->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('id', 'like', '%' . $searchTerm);
            });
        }

        $categories = $usersQuery->paginate(10)->withQueryString();
        $count = $categories->total();

        return view('admin.categories-table', compact('categories', 'count', 'total'));
    }

    public function addCategoryView()
    {
        return view('admin.add-category');
    }

    public function storeCategory(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:categories|max:255',
        ]);

        Category::create($data);

        return redirect()->route('admin.categories')->with('message', 'Категория добавлена');
    }

    public function editCategoryView($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.edit-category', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|max:255|unique:categories,title,' . $id,
        ]);
        $category = Category::findOrFail($id);
        $category->update($data);

        return redirect()->route('admin.categories')->with('message', 'Категория обновлена');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories')->with('message', 'Категория удалена');
    }

//    Действия над типом приложения
    public function searchTypes(Request $request)
    {
        $total = Type::count();
        $searchTerm = $request->input('search');
        $typesQuery = Type::query();

        if ($searchTerm) {
            $typesQuery->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('id', 'like', '%' . $searchTerm);
            });
        }

        $types = $typesQuery->paginate(10)->withQueryString();
        $count = $types->total();

        return view('admin.types-table', compact('types', 'count', 'total'));
    }

    public function addTypeView()
    {
        return view('admin.add-type');
    }

    public function storeType(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:types|max:255',
        ],
            [
                'title.unique' => 'такой тип уже занят'
            ]);

        Type::create($data);

        return redirect()->route('admin.types')->with('message', 'Тип добавлен');
    }

    public function editTypeView($id)
    {
        $type = Type::findOrFail($id);
        return view('admin.edit-type', compact('type'));
    }

    public function updateType(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|max:255|unique:types,title,' . $id,
        ]);
        $type = Type::findOrFail($id);
        $type->update($data);

        return redirect()->route('admin.types')->with('message', 'Тип обновлен');
    }

    public function deleteType($id)
    {
        $type = Type::findOrFail($id);
        $type->delete();
        return redirect()->route('admin.types')->with('message', 'Тип удален');
    }


    public function oneDeveloper($id)
    {
        $developer = Developer::findOrFail($id);
        $applications = Application::where('developer_id', $id)->get();
        $countApplications = $applications->count();
        $totalFeedbackCount = $developer->getTotalFeedbackCount();
        $totalDownloadCount = $developer->getTotalDownloadCount();
        $feedbacks = Feedback::whereIn('application_id', function($query) use ($id) {
            $query->select('id')
                ->from('applications')
                ->where('developer_id', $id);
        })->get();

        $totalFeedbacks = $feedbacks->count();

        if ($totalFeedbacks > 0) {
            $totalStars = $feedbacks->sum('stars');
            $averageRating = $totalStars / $totalFeedbacks;
        } else {
            $averageRating = 0;
        }
        return view('admin.one-developer', compact('developer', 'applications', 'countApplications', 'totalFeedbackCount', 'totalDownloadCount', 'averageRating'));
    }

    public function changeStatus(Request $request, $id)
    {
        $developer = Developer::findOrFail($id);

        $developer->blocked = $request->input('blocked');
        $developer->save();

        return redirect()->back()->with('success', 'Статус разработчика успешно изменен.');
    }

    public function applicationDestroy($id)
    {
        $developer = Application::findOrFail($id);
        $developer->delete();
        return redirect()->back()->with('success', 'Приложение успешно удалено');
    }
    public function updateApplicationStatus(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        $newStatus = $request->input('status');

        $application->status = $newStatus;
        $application->save();

        return redirect()->route('admin.applications')->with('success', 'Статус приложения обновлен!');
    }

}

