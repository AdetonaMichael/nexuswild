<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;

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
Route::resource('posts', PostsController::class);
Route::resource('categories', CategoriesController::class);
Auth::routes();
Route::get('trashed-posts', [PostsController::class, 'trashed'])->name('trashed-posts.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::put('restore-post/{post}', [PostsController::class, 'restore'])->name('restore-posts');