<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::inertia('/', 'welcome')->name('home');

//ejercicios de rutas

Route::get('/bye', function () {
    return 'Hasta luego';
})-> name("Chao");

Route::get('/hello', function () {
    return 'Hola, ¿como estas?';
});

Route::get('/edad/{id}/{nombre}', function ($id, $nombre) {
    return "Tengo " . $id . " años y me llamo " . $nombre;
});

Route::get('admin/posts/example', function () {
    $url = route("admin.home"); //se usa el alias para no escribir toda la ruta
    return "Esta es la url actual: " . $url;
})->name('admin.home');
//registro de ruta controlador
Route::resource('user', UserController::class);
Route::get('contact', [UserController::class, 'contact']);
Route::get('show/{id}', [UserController::class, 'show_post']);