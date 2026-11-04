<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::get('/menus', function () {
    return 'Daftar Menu';
})->name('menus.index');
