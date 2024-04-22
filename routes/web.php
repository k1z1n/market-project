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
