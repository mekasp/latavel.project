<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminTagController;

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

Route::get('/', [PostController::class, 'index']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'posts'])->name('user.posts');
Route::get('/user/{user_id}/category/{category_id}', [UserController::class, 'categoriesPosts'])->name('user.category.posts');
Route::get('/user/{user_id}/category/{category_id}/tag/{tag_id}', [UserController::class, 'categoriesPostsTags'])->name('user.category.tag.posts');

Route::get('/tag', [TagController::class, 'index']);
Route::get('/tag/{id}', [TagController::class, 'posts'])->name('tag.posts');

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'posts'])->name('category.posts');

Route::get('/admin', function ()
{
    return view('/admin/index', [
        'title' => 'Home page'
    ]);
});

Route::get('/admin/post', [AdminPostController::class, 'index'])->name('admin.posts');
Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('admin.post.create');
Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('admin.post.store');
Route::get('/admin/post/{id}/edit', [AdminPostController::class, 'edit'])->name('admin.post.edit');
Route::post('/admin/post/update', [AdminPostController::class, 'update'])->name('admin.post.update');
Route::get('/admin/post/{id}/delete', [AdminPostController::class, 'destroy'])->name('admin.post.destroy');

Route::get('/admin/category', [AdminCategoryController::class, 'index'])->name('admin.categories');
Route::get('/admin/category/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category/store', [AdminCategoryController::class, 'store'])->name('admin.category.store');
Route::get('/admin/category/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('/admin/category/update', [AdminCategoryController::class, 'update'])->name('admin.category.update');
Route::get('/admin/category/{id}/delete', [AdminCategoryController::class, 'destroy'])->name('admin.category.destroy');

Route::get('/admin/tag', [AdminTagController::class, 'index'])->name('admin.tags');
Route::get('/admin/tag/create', [AdminTagController::class, 'create'])->name('admin.tag.create');
Route::post('/admin/tag/store', [AdminTagController::class, 'store'])->name('admin.tag.store');
Route::get('/admin/tag/{id}/edit', [AdminTagController::class, 'edit'])->name('admin.tag.edit');
Route::post('/admin/tag/update', [AdminTagController::class, 'update'])->name('admin.tag.update');
Route::get('/admin/tag/{id}/delete', [AdminTagController::class, 'destroy'])->name('admin.tag.destroy');

