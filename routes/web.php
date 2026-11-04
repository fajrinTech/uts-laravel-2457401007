<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::resource('menus', MenuController::class);
