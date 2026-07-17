<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

Route::get('/create', function () {
    $user = User::find(1);

    $user->roles()->save(new Role(['name' => 'Administrator']));
});

Route::get('/read', function () {
    $user = User::findOrFail(1);

    foreach ($user->roles as $role) {
        echo $role->name;
    }
});

Route::get('/update', function () {
    $user = User::findOrFail(1);

    if ($user->has('roles')) {
        foreach ($user->roles as $role) {
            if ($role->name == 'Administrator') {
                $role->name = 'subscriber';

                $role->save();
            }
        }
    }
});

Route::get('/delete', function () {
    $user = User::findOrFail(1);

    foreach ($user->roles as $role) {
        $role->whereId(1)->delete();
    }
});

Route::get('/attach', function () {
    $user = User::findOrFail(1);

    $user->roles()->attach(6);
});

Route::get('/detach', function () {
    $user = User::findOrFail(1);

    $user->roles()->detach();
});

Route::get('/sync', function () {
    $user = User::findOrFail(1);

    $user->roles()->sync([6, 7]);
});
