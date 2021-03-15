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

Route::get('/oauth/gitHub/callback',\App\Http\Controllers\oauth\GithubController::class);

Route::get('/',\App\Http\Controllers\HomeController::class )->name('home');
Route::get('/author/{id}',\App\Http\Controllers\PostByAuthorController::class)->name('post-by-author');
Route::get('/category/{category}',\App\Http\Controllers\PostByCategoryController::class)->name('post-by-category');
Route::get('/tag/{tag}',\App\Http\Controllers\PostByTagController::class)->name('post-by-tag');
Route::get('/author/{authorId}/category/{categoryId}',\App\Http\Controllers\PostByAuthorAndCategoryController::class)->name('post-by-author-and-category');
Route::get('/author/{authorId}/category/{categoryId}/tag/{tagId}',\App\Http\Controllers\PostByAuthorAndCategoryAndTagController::class)->name('post-by-author-and-category-and-tag');

Route::middleware('guest')->group(function(){
    Route::get('/auth/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');
    Route::post('/auth/login',[\App\Http\Controllers\AuthController::class,'handleLogin'])->name('auth.handle-login');
});

Route::middleware('auth')->group(function() {
    Route::get('/management/posts/create',[\App\Http\Controllers\Post\PostController::class,'create'])->name('post-management.create');
    Route::post('/management/posts/create',[\App\Http\Controllers\Post\PostController::class,'store'])->name('post-management.store');
    Route::get('/management/posts/{post}/edit',[\App\Http\Controllers\Post\PostController::class,'edit'])->name('post-management.edit');
    Route::post('/management/posts/{post}/edit',[\App\Http\Controllers\Post\PostController::class,'update'])->name('post-management.update');
    Route::post('/management/posts/{post}/delete',[\App\Http\Controllers\Post\PostController::class,'delete'])->name('post-management.delete');

    Route::get('/management/categories/create',[\App\Http\Controllers\Category\CategoryController::class,'create'])->name('category-management.create');
    Route::post('/management/categories/create',[\App\Http\Controllers\Category\CategoryController::class,'store'])->name('category-management.store');
    Route::get('/management/categories/{category}/edit',[\App\Http\Controllers\Category\CategoryController::class,'edit'])->name('category-management.edit');
    Route::post('/management/categories/{category}/edit',[\App\Http\Controllers\Category\CategoryController::class,'update'])->name('category-management.update');
    Route::post('/management/categories/{category}/delete',[\App\Http\Controllers\Category\CategoryController::class,'delete'])->name('category-management.delete');

    Route::get('/management/tags/create',[\App\Http\Controllers\Tag\TagController::class,'create'])->name('tag-management.create');
    Route::post('/management/tags/create',[\App\Http\Controllers\Tag\TagController::class,'store'])->name('tag-management.store');
    Route::get('/management/tags/{tag}/edit',[\App\Http\Controllers\Tag\TagController::class,'edit'])->name('tag-management.edit');
    Route::post('/management/tags/{tag}/edit',[\App\Http\Controllers\Tag\TagController::class,'update'])->name('tag-management.update');
    Route::post('/management/tags/{tag}/delete',[\App\Http\Controllers\Tag\TagController::class,'delete'])->name('tag-management.delete');

    Route::get('/auth/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
});
