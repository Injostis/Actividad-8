<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroController;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/superhero', function () {
    return view('superhero.index');
});
Route::get('/superhero/create', [SuperheroController::class, 'create']); */

Route::resource('superhero',SuperheroController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
