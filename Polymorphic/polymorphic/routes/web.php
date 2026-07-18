<?php

use App\Models\Staff;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

Route::get('/create', function () {
    $staff = Staff::find(1);

    $staff->photos()->create(['path' => 'example.jpg']);
});

Route::get('/read', function () {
    $staff = Staff::findOrFail(1);

    foreach ($staff->photos as $photo) {
        return $photo->path;
    }
});

Route::get('/update', function () {
    $staff = Staff::findOrFail(1);

    $photo = $staff->photos()->whereId(1)->first();

    $photo->path = "Updated example.jpg";

    $photo->save();
});

Route::get('/delete', function () {
    $staff = Staff::findOrFail(1);

    $staff->photos()->whereId(1)->delete();
});
