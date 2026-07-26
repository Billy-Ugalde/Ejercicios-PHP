<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/test-admin', function () {
    $user = Auth::user();

    if ($user->isAdmin()) {
        echo 'this is user is a administrator';
    }
});

Route::get('/admin/user/roles', function () {
    return 'Middleware role';
})->middleware(['role', 'auth', 'web']);

require __DIR__.'/settings.php';
