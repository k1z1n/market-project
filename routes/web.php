<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\IconController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth.check')->group(function () {

    Route::get('/', [MainController::class, 'mainView'])->name('main')->middleware('record.visit');
    Route::get('/search/history', [CatalogController::class, 'getSearchHistory'])->name('search.history');
    Route::get('/application/{id}', [ApplicationController::class, 'applicationView'])->name('application.view');
    Route::get('/application/download/{id}', [ApplicationController::class, 'download'])->name('application.download');
    Route::get('/application/download/js/{id}', [ApplicationController::class, 'downloadForJs'])->name('application.download.js');

    Route::get('/developer/show/{id}', [DeveloperController::class, 'oneDeveloperView'])->name('developer.one');
    Route::get('/feedback/{id}', [FeedbackController::class, 'feedbackView'])->name('feedback.view');
    Route::post('/feedback/store', [FeedbackController::class, 'feedbackStore'])->name('feedback.add.store');

//Route::view('/comp', 'compilation')->name('compilation');
    Route::get('/profile', [ProfileController::class, 'profileView'])->name('profile')->middleware('auth.check');
//    Route::view('/profile', 'profile')->name('profile')->middleware('auth.check');
    Route::view('/developer', 'developer')->name('developer');
//Route::view('/application', 'application')->name('application');
    Route::view('/update/app', 'developer.update-app')->name('update.app');
    Route::view('/statistics', 'admin.statistics')->name('statistics');
    Route::view('/admin/developers', 'admin.developers')->name('developers');
//Route::view('/admin/users', 'admin.users')->name('users');
    Route::view('/admin/games', 'admin.games')->name('games');

    Route::get('/catalog/search', [CatalogController::class, 'search'])->name('catalog.search');
    Route::get('/search/history', [CatalogController::class, 'getSearchHistory']);

    Route::get('/catalog/type/{types}', [CatalogController::class, 'catalogViewType'])->name('catalog.view.type');

    Route::get('/compilations', [CatalogController::class, 'compilationView'])->name('compilations');
    Route::get('/compilations/{id}', [CatalogController::class, 'compilationCategoryView'])->name('compilation.category');

    Route::post('/update/user/name', [UserController::class, 'updateUserName'])->name('user.name.update');

    Route::get('/catalog', [CatalogController::class, 'catalogView'])->name('catalog.index');
});

Route::prefix('admin')->middleware('auth.admin')->group(function () {
    Route::get('/banner', [BannerController::class, 'index'])->name('banner.index');
    Route::post('/banner/update', [BannerController::class, 'update'])->name('banner.update');

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
    Route::get('/developer/{id}', [AdminController::class, 'oneDeveloper'])->name('admin.developer.show');
    Route::post('/developer/{id}/change-status', [AdminController::class, 'changeStatus'])->name('developer.changeStatus');


    Route::get('/application/search', [AdminController::class, 'searchApplications'])->name('admin.application.search');
    Route::get('/application/{id}', [AdminController::class, 'oneApplicationView'])->name('admin.application.show');
    Route::delete('/application/destroy/{id}', [AdminController::class, 'applicationDestroy'])->name('admin.application.delete');
});

Route::prefix('user')->middleware('auth.guest')->group(function () {
    Route::get('/login', [UserController::class, 'userLoginView'])->name('user.login');
    Route::post('/login', [UserController::class, 'userLogin'])->name('user.login.store');

    Route::get('/verification', [UserController::class, 'codeView'])->name('user.code');
    Route::post('/verification', [UserController::class, 'verify'])->name('user.code.store');


    Route::get('/auth', [UserController::class, 'loginUserView'])->name('auth.login');
    Route::post('/auth', [UserController::class, 'loginUser'])->name('auth.login.store');
    Route::get('/register', [UserController::class, 'registerUserView'])->name('auth.register');
    Route::post('/register', [UserController::class, 'registerUser'])->name('auth.register.store');
});

Route::prefix('developer')->middleware('developer.guest')->group(function () {
    Route::get('/authorization', [DeveloperController::class, 'developerLoginView'])->name('developer.login');
    Route::post('/authorization', [DeveloperController::class, 'developerLogin'])->name('developer.login.store');

    Route::get('/verification', [DeveloperController::class, 'developerCodeView'])->name('developer.code');
    Route::post('/verification', [DeveloperController::class, 'developerVerify'])->name('developer.code.store');


    Route::get('/auth', [DeveloperController::class, 'loginDeveloperView'])->name('developer.auth.login');
    Route::post('/auth', [DeveloperController::class, 'loginDeveloper'])->name('developer.auth.login.store');
    Route::get('/register', [DeveloperController::class, 'registerDeveloperView'])->name('developer.auth.register');
    Route::post('/register', [DeveloperController::class, 'registerDeveloper'])->name('developer.auth.register.store');
});

Route::prefix('user')->middleware('auth.check')->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
});

Route::middleware('developer.check')->group(function () {
    Route::get('/developer/app/add', [DeveloperController::class, 'addApplicationView'])->name('developer.add.app');
    Route::post('/developer/app/store', [DeveloperController::class, 'addApplicationStore'])->name('developer.application.store');
    Route::get('/developer/app/{id}/edit', [DeveloperController::class, 'editApplicationView'])->name('developer.application.edit');

    Route::post('/developer/app/update-logo/{id}', [DeveloperController::class, 'updateApplicationLogo'])->name('developer.application.update.logo');
    Route::post('/developer/app/update-title/{id}', [DeveloperController::class, 'updateApplicationTitle'])->name('developer.application.update.title');
    Route::post('/developer/app/update-age/{id}', [DeveloperController::class, 'updateApplicationAge'])->name('developer.application.update.age');
    Route::post('/developer/app/update-category/{id}', [DeveloperController::class, 'updateApplicationCategory'])->name('developer.application.update.category');
    Route::post('/developer/app/update-type/{id}', [DeveloperController::class, 'updateApplicationType'])->name('developer.application.update.type');
    Route::post('/developer/app/update-description/{id}', [DeveloperController::class, 'updateApplicationDescription'])->name('developer.application.update.description');
    Route::post('/developer/app/update-images/{id}', [DeveloperController::class, 'updateApplicationPhotos'])->name('developer.application.update.images');
    Route::post('/developer/app/update-version/{id}', [DeveloperController::class, 'updateApplicationVersion'])->name('developer.application.update.version');

    Route::get('/developer/profile', [DeveloperController::class, 'developerProfileView'])->name('developer.profile');
    Route::post('/developer/update/username', [DeveloperController::class, 'updateUsername'])->name('developer.update.username');
    Route::post('/developer/logout', [DeveloperController::class, 'logout'])->name('developer.logout');
});

