<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

Route::get('/create', function () {
    $user = User::findOrFail(1);

    $user->posts()->save(new Post(['title' => 'Mi primera publicación de Billy', 'body' => 'Amo Laravel, con Fabian']));
});

Route::get('/read', function () {
    $user = User::findOrFail(1);

    foreach ($user->posts as $post) {
        echo $post->title . "<br>";
    }
});
