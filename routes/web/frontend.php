<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;


Route::post('register', [HomeController::class, 'register'])->name('register');
Route::match(['get', 'post'], '/{slug}', [HomeController::class, 'slug'])->where('slug', '.*');
