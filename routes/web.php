<?php

use App\Livewire\Blog\MyBlog;
use App\Livewire\Blog\EditBlog;
use App\Livewire\Blog\ReadBlog;
use App\Livewire\Blog\ViewBlog;
use App\Livewire\Blog\CreateBlog;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::prefix('blog')->middleware('auth')->group(function() {
    Route::get('my-post', MyBlog::class)->name('my.blog');
    Route::get('create', CreateBlog::class)->name('blog.create');
    Route::get('edit/{id}', EditBlog::class)->name('blog.edit');
});
Route::prefix('blog')->group(function() {
    Route::get('/', ViewBlog::class)->name("blog");
    Route::get('read/{id}', ReadBlog::class)->name('read.blog');
});
require __DIR__.'/auth.php';
