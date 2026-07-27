<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

Route::get('/test-mail', function () {
    $data = [
        'title' => 'Hola, esto es una prueba de correos',
        'content' => 'En  el curso de laravel',
    ];

    Mail::send('emails.test', $data, function ($message) {
        $message->to('fb7270321@gmail.com', 'Fabian')->subject('Hola, ¿cómo estás?');
    });

    return 'Email sent';
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__ . '/settings.php';
