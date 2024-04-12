<?php

use App\Http\Controllers\IconController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get('/ss', function (){
    return view('slider');
});


Route::get('/v', [IconController::class, 'createGradient']);
