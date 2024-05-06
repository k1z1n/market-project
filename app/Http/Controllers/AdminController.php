<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function mainView()
    {
        return view('admin.main');
    }

//
//    Категория приложения
//

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

        return redirect()->route('main');
    }

    public function editCategoryView()
    {
        return view('admin.edit-category');
    }

    public function updateCategory(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:categories|max:255',
        ]);

        Category::update($data);

        return redirect()->back()->with('message', 'Категория обновлена');
    }

//
//    Тип приложения
//

    public function addTypeView()
    {
        return view('admin.add-type');
    }

    public function storeType(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:categories|max:255',
        ]);

        Type::create($data);

        return redirect()->back()->with('message', 'Тип добавлен');
    }

    public function editTypeView()
    {
        return view('admin.add-type');
    }

    public function updateType(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:categories|max:255',
        ]);

        Type::update($data);

        return redirect()->back()->with('message', 'Тип обновлен');
    }
}

