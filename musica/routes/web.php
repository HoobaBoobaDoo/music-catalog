<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;


//Page routes
Route::get('/', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/admin/records', [AlbumController::class, 'index'])->name('albums')->middleware('auth');

//Auth routes
Route::post('/register', UserController::class . '@register')->name('register');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/login', [UserController::class, 'login'])->name('login');

//Album controller stuff
Route::post('/admin/records', [AlbumController::class, 'store'])->name('albums.store')->middleware('auth');

Route::delete('/admin/records/{album}', [AlbumController::class, 'destroy'])
    ->name('albums.destroy')
    ->middleware('auth');