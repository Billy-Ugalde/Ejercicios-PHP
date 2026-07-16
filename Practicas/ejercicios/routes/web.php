<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
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
// Route::get('/find', function () {

//     $post = Post::find(11);

//     return $post->title;
// });
//Buscar un registro por una condición where

// Route::get('/findmore', function () {
//     $posts = Post::where('id', '>', 10)->firstOrFail();
//     return $posts;
// });

// //inserción en el modelo post
// Route::get('/insert', function () {

//     $post = new Post;
//     $post->name = 'Nuevo nombre';
//     $post->title = 'Nuevo Título';
//     $post->content = 'Nuevo contenidoi¿';

//     $post->save();
// });

// //Actualización 
// Route::get('/update', function () {

//     $post = Post::find(2);
//     $post->name = 'Nombre actualizado';
//     $post->title = 'Título actualizado';
//     $post->content = 'Contenidoi actualizado';

//     $post->save();
// });
// Route::get('/create', function () {

//     Post::create(['title' => 'Creación del título', 'content' => 'Estoy\' aprendiendo', 'name' => 'Billy']);
// });
// Route::get('/update', function () {

//     Post::where('id', 2)->where('is_admin', 0)->update(['title' => 'Nuevo titulo php', 'content' => 'Php es bonito']);
// });
//Delete por id

// Route::get('/delete', function(){
//
//     $post = Post::find(2);
//
//     $post->delete();
//
// });
//Delete
// Route::get('/delete2', function () {

//     Post::destroy([10, 11]);

//     // Post::where('is_admin', 0)->delete();

// });
// Route::get('/softdelete', function () {

//     Post::find(2)->delete();
// });
// Route::get('/readsoftdelete', function () {
//     $post = Post::onlyTrashed()->where('is_admin', 0)->get();

//     return $post;
// });
// Route::get('/restore', function () {

//     Post::withTrashed()->where('is_admin', 0)->restore();
// });

// Route::get('/restore-post-1', function () {

//     Post::withTrashed()->where('id', 1)->restore();
// });
// Route::get('/forcedelete', function () {

//     Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
// });

// // One to One relationship
// Route::get('/author/{id}/post', function ($id) {

//     return User::find($id)->post->title;
// });

// Route::get('/post/{id}/user', function ($id) {

//     return Post::find($id)->user->name;
// });

// One to Many relationship
// Route::get('/posts', function () {

//     $user = User::find(2);

//     foreach ($user->posts as $post) {

//         echo $post->title . "<br>";
//     }
// });

// Many to Many relationship
// Route::get('/user/{id}/role', function ($id) {

//     $user = User::find($id)->roles()->orderBy('id', 'desc')->get();

//     return $user;
// });

// Route::get('user/pivot', function () {

//     $user = User::find(1);

//     foreach ($user->roles as $role) {

//         return $role->pivot->created_at;
//     }
// });

// Route::get('/user/country', function () {

//     $country = Country::find(2);

//     foreach ($country->posts as $post) {

//         return $post->title;
//     }
// });

// // Polymorphic relationship
// Route::get('user/photos', function () {

//     $user = User::find(1);

//     foreach ($user->photos as $photo) {

//         echo $photo->path . "<br>";
//     }
// });

// Route::get('post/{id}/photos', function ($id) {

//     $post = Post::find($id);

//     foreach ($post->photos as $photo) {

//         echo $photo->path . "<br>";
//     }
// });

// Route::get('photo/{id}/post', function ($id) {

//     $photo = Photo::findOrFail($id);

//     return $photo->imageable;
// });

Route::get('/post/tag', function () {

    $post = Post::find(1);

    foreach ($post->tags as $tag) {

        echo $tag->name;
    }
});
