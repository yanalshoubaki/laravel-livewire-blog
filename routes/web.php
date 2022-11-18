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

Route::get('/', \App\Http\Livewire\Blogs::class);
Route::get('blog', \App\Http\Livewire\Blogs::class)->name('blog');
Route::get('blog/feed', \App\Http\Livewire\Blogs::class)->name('blog.feed');
Route::get('blog/latest', \App\Http\Livewire\Blogs::class)->name('blog.latest');

Route::get('auth/login', \App\Http\Livewire\Auth\Login::class)->name('login');
Route::get('auth/register', \App\Http\Livewire\Auth\Register::class)->name('register');
    Route::get('auth/logout', function(\Illuminate\Http\Request $request) {
        \Illuminate\Support\Facades\Auth::logout();
        return redirect()->route('login');
    })->name('logout');


Route::prefix('category')->name('category.')->group(function () {
    Route::get('create', \App\Http\Livewire\Category\Create::class)->name('create')->middleware('auth');
    Route::get('all', \App\Http\Livewire\Category\All::class)->name('all');
    Route::get('{category:slug}', \App\Http\Livewire\Category\View::class)->name('view');
    Route::get('{category}/update', \App\Http\Livewire\Category\Edit::class)->name('edit')->middleware('auth');
    Route::get('{category}/delete', \App\Http\Livewire\Category\Delete::class)->name('delete')->middleware('auth');
});

Route::prefix('blog')->name('blogs.')->group(function () {
    Route::get('create', \App\Http\Livewire\Blog\Create::class)->name('create')->middleware('auth');
    Route::get('all', \App\Http\Livewire\Blog\All::class)->name('all');
    Route::get('{blog:slug}', \App\Http\Livewire\Blog\View::class)->name('view');
    Route::get('{blog}/update', \App\Http\Livewire\Blog\Edit::class)->name('edit')->middleware('auth');
    Route::get('{blog}/delete', \App\Http\Livewire\Blog\Delete::class)->name('delete')->middleware('auth');
});

Route::get('profile', \App\Http\Livewire\Profile::class)->name('profile')->middleware('auth');
Route::get('settings', \App\Http\Livewire\Settings\Profile::class)->name('settings')->middleware('auth');
Route::prefix('settings')->middleware('auth')->name('settings.')->group(function () {
    Route::get('profile', \App\Http\Livewire\Settings\Profile::class)->name('profile');
    Route::get('security', \App\Http\Livewire\Settings\Security::class)->name('security');
    Route::get('notification', \App\Http\Livewire\Settings\Notifications::class)->name('notification');

});
