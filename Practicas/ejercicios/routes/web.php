<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

//ejercicios de rutas

Route::get('/bye', function () {
    return 'Hasta luego';
})-> name("Chao");

Route::get('/hello', function () {
    return 'Hola, ¿como estas?';
});

Route::get('/edad/{id}', function($id) {
    return "Tengo " . $id . " años";
});