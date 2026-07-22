<?php

use App\Http\Controllers\PostsController;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

Route::resource('/posts', PostsController::class);

// Route::get('/create', function () {
//     $post = Post::create(['name' => 'My first post']);
//     $tag1 = Tag::find(1);
//     $post->tags()->save($tag1);

//     $video = Video::create(['name' => 'video.mov']);
//     $tag2 = Tag::find(2);
//     $video->tags()->save($tag2);
// });

// Route::get('/delete', function () {
//     $post = Post::find(1);

//     foreach ($post->tags as $tag) {
//         $tag->whereId(1)->delete();
//     }
// });

Route::get('/dates', function () {

    $date = new DateTime('+1 week');

    echo $date->format('m-d-Y');

    echo '<br>';

    echo Carbon::now()->addDays(10)->diffForHumans();

    echo '<br>';

    echo Carbon::now()->subMonths(5)->diffForHumans();

    echo '<br>';

    echo Carbon::now()->yesterday();

    echo '<br>';
});

Route::get('/getname', function () {
    $user = User::find(1);

    echo $user->name;
});

Route::get('/setname', function () {
    $user = User::find(1);

    $user->name = "william";
    $user->save();
});
