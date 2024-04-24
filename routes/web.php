<?php

use App\Http\Controllers\IconController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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
Route::view('/profile', 'profile')->name('profile');
Route::view('/developer', 'developer')->name('developer');
Route::view('/application', 'application')->name('application');
Route::view('/update/app', 'developer.update-app')->name('update.app');
Route::view('/statistics', 'admin.statistics')->name('statistics');
Route::view('/developer/profile', 'developer.profile')->name('developer.profile');
Route::view('/admin/developers', 'admin.developers')->name('developers');
Route::view('/admin/users', 'admin.users')->name('users');
Route::view('/admin/games', 'admin.games')->name('games');
