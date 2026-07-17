<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

Route::get('/create', function () {
    $user = User::find(1);

    $user->roles()->save(new Role(['name' => 'Administrator']));
});
