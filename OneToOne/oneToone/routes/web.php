<?php

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

Route::get('/insert', function () {
    $user = User::findOrFail(1);

    $address = new Address(['name' => '1234 Guana av NY NY 11218']);

    $user->address()->save($address);
});

Route::get('/update', function () {
    $address = Address::whereUserId(1)->first();

    $address->name = "43530000 Update Av, alaska ";

    $address->save();
});

Route::get('/read', function () {
    $user = User::findOrFail(1);

    echo $user->address->name;
});

Route::get('/delete', function () {
    $user = User::findOrFail(1);

    $user->address()->delete();

    return "done";
});
