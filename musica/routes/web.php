<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


//Page routes
Route::get('/', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/admin/records', function () {
    return view('admin.records');
});


//Auth routes
Route::post('/register', UserController::class . '@register')->name('register');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/login', [UserController::class, 'login'])->name('login');