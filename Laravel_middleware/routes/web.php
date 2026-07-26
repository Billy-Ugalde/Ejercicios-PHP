<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/home-test', [HomeController::class, 'index']);

Route::get('/admin/user/roles', function () {
    return 'Middleware role';
})->middleware(['web']);

require __DIR__.'/settings.php';
