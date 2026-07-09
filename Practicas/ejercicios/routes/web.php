<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
//use App\Http\Controllers\UserController;

// Route::inertia('/', 'welcome')->name('home');

// Ruta simple de bienvenida con nombre de ruta
// //ejercicios de rutas

// Route::get('/bye', function () {
//     return 'Hasta luego';
// })-> name("Chao");

// Ruta de saludo básica
// Route::get('/hello', function () {
//     return 'Hola, ¿como estas?';
// });

// Ruta con parámetros en la URL
// Route::get('/edad/{id}/{nombre}', function ($id, $nombre) {
//     return "Tengo " . $id . " años y me llamo " . $nombre;
// });

// Uso de alias de ruta (route name)
// Route::get('admin/posts/example', function () {
//     $url = route("admin.home"); //se usa el alias para no escribir toda la ruta
//     return "Esta es la url actual: " . $url;
// })->name('admin.home');
// //registro de ruta controlador
// Route::resource('user', UserController::class);
// Route::get('contact', [UserController::class, 'contact']);
// Route::get('post/{id}/{name}/{password}', [UserController::class, 'show_post']);

// Insertar registro con Query Builder (DB::insert)
// Route::get('/insert', function () {

//     DB::insert('insert into posts(title, content, name) values(?, ?,?)', ['PHP con Laravel', 'Laravel', 'James']);

//     return view('insert');
// });

// Leer registro con SQL crudo (DB::select)
// Route::get('/read', function () {
//     $results = DB::select('select * from posts where id = ?', [1]);


//     // return $results;
//     foreach ($results as $posts) {
//         return $posts->title;
//     }
// });

// Actualizar registro con Query Builder (DB::update)
// Route::get('/update', function () {
//     $updated = DB::update('update posts set name = ? where id = ?', ['Actualización del nombre', 1]);

//     return $updated;
// });

// Eliminar registro con Query Builder (DB::delete)
// Route::get('/delete', function () {
//     $deleted = DB::delete('delete from posts where id = ?', [5]);

//     return $deleted;
// });

// Leer todos los registros con Eloquent (Post::all)
// Route::get('/read', function () {

//     $posts = Post::all();

//     foreach ($posts as $post) {

//         return $post->title;
//     }
// });

// Buscar un registro por id con Eloquent (Post::find)
Route::get('/find', function () {

    $post = Post::find(11);

    return $post->title;
});
