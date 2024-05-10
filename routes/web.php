<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DeveloperController;
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

Route::view('/comp', 'compilation')->name('compilation');
Route::view('/catalog', 'catalog')->name('catalog');
Route::view('/profile', 'profile')->name('profile')->middleware(CheckAuth::class);
Route::view('/developer', 'developer')->name('developer');
Route::view('/application', 'application')->name('application');
Route::view('/update/app', 'developer.update-app')->name('update.app');
Route::view('/statistics', 'admin.statistics')->name('statistics');
Route::view('/developer/profile', 'developer.profile')->name('developer.profile');
Route::view('/admin/developers', 'admin.developers')->name('developers');
//Route::view('/admin/users', 'admin.users')->name('users');
Route::view('/admin/games', 'admin.games')->name('games');


Route::get('/developer/app/add', [ApplicationController::class, 'applicationAddView'])->name('developer.add.app');

Route::get('/catalog/{type}/{category}', [CatalogController::class, 'catalogView'])->name('catalog.index');

Route::prefix('admin')->middleware('auth.admin')->group(function () {
    Route::get('/', [AdminController::class, 'mainView'])->name('admin.index');
    Route::get('/users', [AdminController::class, 'usersView'])->name('admin.users');
    Route::get('/developers', [AdminController::class, 'developersView'])->name('admin.developers');
    Route::get('/applications', [AdminController::class, 'applicationsView'])->name('admin.applications');
    Route::get('/types', [AdminController::class, 'typesView'])->name('admin.types');
    Route::get('/categories', [AdminController::class, 'categoriesView'])->name('admin.categories');

    Route::get('/users/search', [AdminController::class, 'searchUsers'])->name('admin.users.search');
    Route::post('/users/{id}/update-status', [AdminController::class, 'updateStatus'])->name('admin.users.update.status');
    Route::post('/users/{id}/block', [AdminController::class, 'updateBlockedStatus'])->name('admin.users.update.blocked');

    Route::get('/category/search', [AdminController::class, 'searchCategories'])->name('admin.category.search');
    Route::get('/category/add', [AdminController::class, 'addCategoryView'])->name('admin.category.add');
    Route::post('/category/store', [AdminController::class, 'storeCategory'])->name('admin.category.store');
    Route::get('/category/{id}/edit', [AdminController::class, 'editCategoryView'])->name('admin.category.edit');
    Route::put('/category/{id}/update', [AdminController::class, 'updateCategory'])->name('admin.category.update');
    Route::delete('/category/{id}/delete', [AdminController::class, 'deleteCategory'])->name('admin.category.delete');

    Route::get('/type/search', [AdminController::class, 'searchTypes'])->name('admin.type.search');
    Route::get('/type/add', [AdminController::class, 'addTypeView'])->name('admin.type.add');
    Route::post('/type/store', [AdminController::class, 'storeType'])->name('admin.type.store');
    Route::get('/type/{id}/edit', [AdminController::class, 'editTypeView'])->name('admin.type.edit');
    Route::put('/type/{id}/update', [AdminController::class, 'updateType'])->name('admin.type.update');
    Route::delete('/type/{id}/delete', [AdminController::class, 'deleteType'])->name('admin.type.delete');

    Route::get('/developer/search', [AdminController::class, 'searchDevelopers'])->name('admin.developer.search');
    Route::get('/developer/{id}', [AdminController::class, 'developerOneView'])->name('admin.developer.show');

    Route::get('/application/search', [AdminController::class, 'searchApplications'])->name('admin.application.search');
});

Route::prefix('user')->middleware('auth.guest')->group(function () {
    Route::get('/login', [UserController::class, 'userLoginView'])->name('user.login');
    Route::post('/login', [UserController::class, 'userLogin'])->name('user.login.store');

    Route::get('/verification', [UserController::class, 'codeView'])->name('user.code');
    Route::post('/verification', [UserController::class, 'verify'])->name('user.code.store');
});

Route::prefix('developer')->middleware('auth.guest')->group(function () {
    Route::get('/login', [DeveloperController::class, 'developerLoginView'])->name('developer.login');
    Route::post('/login', [DeveloperController::class, 'developerLogin'])->name('developer.login.store');

    Route::get('/verification', [DeveloperController::class, 'developerCodeView'])->name('developer.code');
    Route::post('/verification', [DeveloperController::class, 'developerVerify'])->name('developer.code.store');
});

Route::prefix('user')->middleware('auth.check')->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
});

