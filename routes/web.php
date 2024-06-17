<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataTablesController;
use App\Http\Controllers\TravelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signin', function() {
    return view('auth.login');
});
Route::post('/signin', [AdminController::class, 'signin'])->name('admin.signin');
Route::middleware('auth')->prefix('/admin')->group(function() {
    Route::get('/dashboard', function() {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/travel-data-table', [DataTablesController::class, 'travelDataTables'])->name('travel.table');
    Route::resource('travel', TravelController::class)->names([
        'index' => 'admin.travel.index',
        'create' => 'admin.travel.create'
    ]);

});