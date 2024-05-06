<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\IconController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAuth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'mainView'])->name('main');


Route::get('/ss', function () {
    return view('slider');
});


Route::get('/v', [IconController::class, 'createGradient']);

Route::get('/login', function () {
    return view('login-developer');
});
Route::view('/reg', 'login-user')->name('login.user');

Route::get('/code', function (){
    return view('code');
});

Route::view('/comp', 'compilation')->name('compilation');
Route::view('/catalog', 'catalog')->name('catalog');
Route::view('/profile', 'profile')->name('profile')->middleware(CheckAuth::class);
Route::view('/developer', 'developer')->name('developer');
Route::view('/application', 'application')->name('application');
Route::view('/update/app', 'developer.update-app')->name('update.app');
Route::view('/statistics', 'admin.statistics')->name('statistics');
Route::view('/developer/profile', 'developer.profile')->name('developer.profile');
Route::view('/admin/developers', 'admin.developers')->name('developers');
Route::view('/admin/users', 'admin.users')->name('users');
Route::view('/admin/games', 'admin.games')->name('games');


Route::get('/developer/app/add', [ApplicationController::class, 'applicationAddView'])->name('developer.add.app');

Route::get('/admin')->name('admin.main');
Route::get('/admin/category/add', [AdminController::class, 'addCategoryView'])->name('admin.category.add');
Route::post('admin/category/store', [AdminController::class, 'storeCategory'])->name('admin.category.store');
Route::get('admin/category/{id}/edit', [AdminController::class, 'editCategoryView'])->name('admin.category.edit');
Route::put('admin/category/{id}/update', [AdminController::class, 'updateCategory'])->name('admin.category.update');

Route::get('/admin/type/add', [AdminController::class, 'addTypeView'])->name('admin.type.add');
Route::post('/admin/type/store', [AdminController::class, 'storeType'])->name('admin.type.store');
Route::get('/admin/type/{id}/edit', [AdminController::class, 'editTypeView'])->name('admin.type.edit');
Route::put('/admin/type/{id}/update', [AdminController::class, 'updateType'])->name('admin.type.update');

Route::post('/user/store', [UserController::class, 'userLogin'])->name('user.login.store');
Route::get('/user/login', [UserController::class, 'userLoginView'])->name('user.login');

Route::get('/user/code', [UserController::class, 'codeView'])->name('user.code');
Route::post('/user/code/store', [UserController::class, 'verify'])->name('user.code.store');

Route::post('/user/logout', [UserController::class, 'logout'])->name('user.logout')->middleware(CheckAuth::class);
