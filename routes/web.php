<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

//Inicio
Route::get('/', function () {
    return view('home');
})->name('home');

//Comunidades
Route::controller(CommunityController::class)->group(function(){
    Route::get('/communities', 'index')->name('communities.index');
    Route::get('/communities/{community:title}', 'show')->name('community.show');
});

//Posts
Route::controller(PostController::class)->group(function(){
    Route::get('/communities/{community:title}/{post:slug?}','show')->name('post.show');

});

//Comentarios
Route::controller(CommentController::class)->group(function (){
    Route::get('/communities/{community}/posts/{post}/comments/', 'index')->name('comment.index');
    Route::get('/communities/{community}/posts/{post}/comments/{comment}', 'show')->name('comment.show');
    Route::post('/communities/{community}/posts/{post}/comment/store', 'store')->name('comment.store');
    Route::post('/communities/{community}/posts/{post}/comment/update', 'update')->name('comment.update');
    Route::post('/communities/{community}/posts/{post}/comments/{comment}', 'delete')->name('comment.delete');
});

//----------------------------------AUTORIZADAS----------------------------------------------
//Perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Comunidad
Route::controller(CommunityController::class)->group(function(){
    Route::get('/community/create', [CommunityController::class, 'create'])->name('community.create');
    Route::post('/community/store',  [CommunityController::class, 'store'])->name('community.store');
    Route::post('/community/update', [CommunityController::class, 'update'])->name('community.update');
})->middleware('auth');

//Post 

Route::controller(PostController::class)->group(function(){
    Route::get('post/create', 'create')->name('post.create');
    Route::post('communities/{community:title}/post/store', 'store')->name('post.store');
    Route::post('communities/{community:title}/post/update', 'update')->name('post.update');
    Route::post('communities/{community:title}/post/delete', 'delete')->name('post.delete');    
});


//Timeline
Route::view('/timeline', 'timeline')->name('timeline');


require __DIR__.'/auth.php';