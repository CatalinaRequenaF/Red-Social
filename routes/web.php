<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Mis rutas (Sin protección)
Route::get('/posts', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('create.post');


/*

Route::get('/posts/{post}/comments/{comment}', function (string $postId, string $commentId) {
    // ...
});
Route::get('/users/{user}/posts/{post:slug}', function (User $user, Post $post) {
    return $post;
});*/

//Comunidades
//Vistas
Route::controller(CommunityController::class)->group(function(){
    Route::get('/communities', 'index')->name('community.index');
    Route::get('/{community}', 'show')->name('community.show');
    Route::get('/community/create', 'create')->name('community.create');
    Route::post('/community/store', 'store')->name('community.store');
});

//Posts
Route::prefix('{community}')->group(function () {
    Route::controller(PostController::class)->group(function(){
        Route::get('/users', function () {
            Route::get('/{post}', 'show')->name('post.show');
            Route::get('/create-post', 'create')->name('post.create');
            Route::post('/post/store', 'store')->name('post.store');
        });
    });

});

//Comentarios




//Admin routes

//-------------------

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Community-auth
   
});




require __DIR__.'/auth.php';
