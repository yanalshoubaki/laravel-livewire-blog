<?php

use App\Http\Controllers\UserWizardController;
use Illuminate\Support\Facades\Route;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;
use Ycs77\LaravelWizard\Facades\Wizard;
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

Route::get('/', \App\Http\Livewire\Pages\Blog\Home::class);
Route::get('blog', \App\Http\Livewire\Pages\Blog\Home::class)->name('blog');
Route::get('blog/feed', \App\Http\Livewire\Pages\Blog\Home::class)->name('blog.feed');
Route::get('blog/latest', \App\Http\Livewire\Pages\Blog\Home::class)->name('blog.latest');

Route::get('auth/login', \App\Http\Livewire\Auth\Login::class)->name('login');
Route::get('auth/register', \App\Http\Livewire\Auth\Register::class)->name('register');
Route::get('auth/Logout', function () {
    auth()->logout();
    return redirect()->route('blog');
})->name('logout');
Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('home', \App\Http\Livewire\Pages\Category\Home::class)->name('home');
});

Route::prefix('blogs')->name('blogs.')->group(function () {
    Route::get('home', \App\Http\Livewire\Pages\Blog\Home::class)->name('home');
});

Route::get('profile', \App\Http\Livewire\Pages\Settings\Profile::class)->name('profile')->middleware('auth');
Route::get('settings', \App\Http\Livewire\Pages\Settings\Profile::class)->name('settings')->middleware('auth');
Route::prefix('settings')->middleware('auth')->name('settings.')->group(function () {
    Route::get('profile', \App\Http\Livewire\Pages\Settings\Profile::class)->name('profile');
    Route::get('security', \App\Http\Livewire\Pages\Settings\Sercurity::class)->name('security');
});
Route::get('health', HealthCheckResultsController::class);

Wizard::routes('wizard/user', UserWizardController::class, 'wizard.user');
