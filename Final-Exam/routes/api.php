<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API controll users------------------------------------------
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users_posts_comments', [UserController::class, 'getPostsComments']);
Route::get('/users_posts_comments_likes', [UserController::class, 'getPostsCommentsLikes']);
Route::get('/users_posts_comments_likes/{id} ', [UserController::class, 'showPostsCommentsLikes']);
Route::get('/count_posts_comments', [UserController::class, 'countPostsComments']);

// API controll posts------------------------------------------
Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);

// API controll comments------------------------------------------
Route::get('/comments', [CommentController::class, 'index']);
Route::post('/comments', [CommentController::class, 'store']);

// API controll like------------------------------------------
Route::get('/likes', [LikeController::class, 'index']);
Route::post('/likes', [LikeController::class, 'store']);