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


Auth::routes(['register' => false]);

Route::get('/home', [HC::class, 'index'])->name('home')->middleware('gate:home');
Route::get('/', [HC::class, 'landingPage'])->name('welcome')->middleware('gate:home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about')->middleware('gate:home');

Route::prefix('post')->name('post_')->group(function () {
    Route::get('/', [Post::class, 'index'])->name('index')->middleware('gate:show');
    Route::get('/create', [Post::class, 'create'])->name('create')->middleware('gate:show');
    Route::post('/create', [Post::class, 'store'])->name('store')->middleware('gate:admin');
    Route::get('/show/{post}', [Post::class, 'show'])->name('show')->middleware('gate:show');
    Route::delete('/delete/{post}', [Post::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{post}', [Post::class, 'edit'])->name('edit')->middleware('gate:show');
    Route::put('/edit/{post}', [Post::class, 'update'])->name('update')->middleware('gate:admin');
});
