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

Route::get('/', \App\Http\Livewire\Blog::class);
Route::get('blog', \App\Http\Livewire\Blog::class)->name('blog');
Route::get('blog/feed', \App\Http\Livewire\Blog::class)->name('blog.feed');
Route::get('blog/latest', \App\Http\Livewire\Blog::class)->name('blog.latest');

Route::get('auth/login', \App\Http\Livewire\AuthBlog::class)->name('login');
Route::get('auth/register', \App\Http\Livewire\AuthBlog::class)->name('register');

Route::prefix('category')->name('category.')->group(function () {
    Route::get('create', \App\Http\Livewire\Category\Create::class)->name('create')->middleware('auth');
    Route::get('all', \App\Http\Livewire\Category\All::class)->name('all');
    Route::get('{slug}', \App\Http\Livewire\Category\View::class)->name('view');
    Route::get('{id}/update', \App\Http\Livewire\Category\Edit::class)->name('edit')->middleware('auth');
    Route::get('{id}/delete', \App\Http\Livewire\Category\Delete::class)->name('delete')->middleware('auth');
});

Route::prefix('post')->name('posts.')->group(function () {
    Route::get('create', \App\Http\Livewire\Post\Create::class)->name('create')->name('create')->middleware('auth');
    Route::get('all', \App\Http\Livewire\Post\All::class)->name('all');
    Route::get('{slug}', \App\Http\Livewire\Post\View::class)->name('view');
    Route::get('{id}/update', \App\Http\Livewire\Post\Edit::class)->name('edit')->name('edit')->middleware('auth');
    Route::get('{id}/delete', \App\Http\Livewire\Post\Delete::class)->name('delete')->name('delete')->middleware('auth');
});


