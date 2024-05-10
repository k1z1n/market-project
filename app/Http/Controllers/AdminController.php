<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Developer;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

//    Страницы админки
    public function mainView()
    {
        return view('admin.main');
    }

    public function typesView()
    {
        $total = Type::all()->count();
        $types = Type::paginate(10);
        return view('admin.types-table', compact('types', 'total'));
    }

    public function categoriesView()
    {
        $total = Category::all()->count();
        $categories = Category::paginate(10);
        return view('admin.categories-table', compact('categories', 'total'));
    }

    public function applicationsView()
    {
        $applications = Application::all();
        return view('admin.applications-table', compact('applications'));
    }

    public function usersView()
    {
        $total = User::all()->count();
        $users = User::paginate(10);
        return view('admin.users-table', compact('users', 'total'));
    }

    public function developersView()
    {
        $developers = Developer::all();
        return view('admin.developers-table', compact('developers'));
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
        $total = Category::all()->count();
        $searchTerm = $request->input('search');
        $usersQuery = Category::query();

        if ($searchTerm) {
            $usersQuery->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('id', 'like', '%' . $searchTerm);
            });
        }

        $category = $usersQuery->paginate(10)->withQueryString();
        $count = $category->total();

        return view('admin.categories-table', compact('category', 'count', 'total'));
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

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories')->with('message', 'Категория удалена');
    }

//    Действия над типом приложения

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
}

