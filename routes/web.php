<?php

use App\Http\Controllers\IconController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'mainView'])->name('main');


Route::get('/ss', function () {
    return view('slider');
});


Route::get('/v', [IconController::class, 'createGradient']);

Route::get('/log', function () {
    return view('login-developer');
});

Route::get('/reg', function () {
    return view('login-user');
});

Route::get('/code', function (){
    return view('code');
});

Route::view('/comp', 'compilation');
Route::view('/catalog', 'catalog');
Route::view('/profile', 'profile');
Route::view('/developer', 'developer');
Route::view('/application', 'application');
Route::view('/update/app', 'developer.update-app');
Route::view('/statistics', 'admin.statistics');
Route::view('/developer/profile', 'developer.profile');
Route::view('/admin/developers', 'admin.developers');
Route::view('/admin/users', 'admin.users');
Route::view('/admin/games', 'admin.games');
