<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\UserController;

// Route::inertia('/', 'welcome')->name('home');

// //ejercicios de rutas

// Route::get('/bye', function () {
//     return 'Hasta luego';
// })-> name("Chao");

// Route::get('/hello', function () {
//     return 'Hola, ¿como estas?';
// });

// Route::get('/edad/{id}/{nombre}', function ($id, $nombre) {
//     return "Tengo " . $id . " años y me llamo " . $nombre;
// });

// Route::get('admin/posts/example', function () {
//     $url = route("admin.home"); //se usa el alias para no escribir toda la ruta
//     return "Esta es la url actual: " . $url;
// })->name('admin.home');
// //registro de ruta controlador
// Route::resource('user', UserController::class);
// Route::get('contact', [UserController::class, 'contact']);
// Route::get('post/{id}/{name}/{password}', [UserController::class, 'show_post']);

// Route::get('/insert', function () {

//     DB::insert('insert into posts(title, content, name) values(?, ?,?)', ['PHP con Laravel', 'Laravel', 'James']);

//     return view('insert');
// });

// Route::get('/read', function () {
//     $results = DB::select('select * from posts where id = ?', [1]);


//     // return $results;
//     foreach ($results as $posts) {
//         return $posts->title;
//     }
// });

// Route::get('/update', function () {
//     $updated = DB::update('update posts set name = ? where id = ?', ['Actualización del nombre', 1]);

//     return $updated;
// });

Route::get('/delete', function () {
    $deleted = DB::delete('delete from posts where id = ?', [5]);

    return $deleted;
});
