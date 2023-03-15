<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\CommunityController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Registro
Route::post('/register', [AuthController::class, 'register']);
//Login
Route::post('/login', [AuthController::class, 'login']);

/*
//Sin autorizacion-------------
Route::apiResource('communities', CommunityController::class)->only([
    'index', 'show'
]);
Route::apiResource('posts', PostController::class)->only([
    'index', 'show'
]);
Route::apiResource('comments', CommentController::class)->only([
    'index', 'show'
]);


//Grupo que requiere autorizacion
Route::middleware('auth:sanctum')->group(function(){
    //Ruta LOGOUT
    Route::get('logout', [AuthController::class, 'logout']);
    
    Route::apiResource('communities', CommunityController::class)->except([
        'index', 'show'
    ]);
    Route::apiResource('posts', PostController::class)->except([
        'index', 'show'
    ]);
    Route::apiResource('comments', CommentController::class)->except([
        'index', 'show'
    ]);

    //
});
    */


//Grupo que no requiere autorizacion