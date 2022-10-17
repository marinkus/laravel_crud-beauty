<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController as Post;
use App\Http\Controllers\HomeController as HC;

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


Auth::routes();

Route::get('/home', [HC::class, 'index'])->name('home');
Route::get('/', [HC::class, 'landingPage'])->name('welcome');
// Route::get('/gallery', [App\Http\Controllers\HomeController::class, 'gallery'])->name('gallery');
// Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::prefix('post')->name('post_')->group(function () {
    Route::get('/', [Post::class, 'index'])->name('index');
    Route::get('/create', [Post::class, 'create'])->name('create');
    Route::post('/create', [Post::class, 'store'])->name('store');
    Route::get('/show/{post}', [Post::class, 'show'])->name('show');
    Route::delete('/delete/{post}', [Post::class, 'destroy'])->name('delete');
    Route::get('/edit/{post}', [Post::class, 'edit'])->name('edit');
    Route::put('/edit/{post}', [Post::class, 'update'])->name('update');
});
