<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/user', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('/user/{user}', [\App\Http\Controllers\UserController::class, 'posts']);
Route::get('/tag', [\App\Http\Controllers\TagController::class, 'index']);
Route::get('/tag/{tag}', [\App\Http\Controllers\TagController::class, 'posts']);
Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/category/{category}', [\App\Http\Controllers\CategoryController::class, 'posts']);
Route::get('/user/{user_id}/category/{category_id}', [\App\Http\Controllers\UserController::class, 'categoriesPosts']);
Route::get('/user/{user_id}/category/{category_id}/tag/{tag_id}', [\App\Http\Controllers\UserController::class, 'categoriesPostsTags']);

