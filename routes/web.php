<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signin', function() {
    return view('auth.login');
});
Route::post('/signin', [AdminController::class, 'signin'])->name('admin.signin');
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function() {
        return view('admin.index');
    })->name('admin.dashboard');
});