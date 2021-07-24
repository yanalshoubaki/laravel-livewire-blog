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

Route::get('/', function () {
    return view('welcome');
});
Route::get('blog', \App\Http\Livewire\Blog::class);
Route::get('auth/login', \App\Http\Livewire\AuthBlog::class)->name('login');
Route::get('auth/register', \App\Http\Livewire\AuthBlog::class)->name('register');

Route::prefix('category')->name('category.')->group(function () {
    Route::get('create', \App\Http\Livewire\Category\Create::class);
    Route::get('all', \App\Http\Livewire\Category\All::class);
    Route::get('{slug}', \App\Http\Livewire\Category\View::class);
});

Route::prefix('post')->name('posts.')->group(function () {
    Route::get('create', \App\Http\Livewire\Post\Create::class);
    Route::get('all', \App\Http\Livewire\Post\All::class);
    Route::get('{slug}', \App\Http\Livewire\Post\View::class);

});


