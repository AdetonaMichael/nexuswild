<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Spatie\Newsletter\NewsletterFacade as Newsletter;
// use Newsletter;

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
})->middleware('pagespeed');

Route::resource('posts', PostsController::class)->middleware('pagespeed');
Route::get('/blog/posts/{post}',[PostsController::class, 'show'])->name('blog.show')->middleware(['pagespeed','doNotCacheResponse']);
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('pagespeed')->middleware(['pagespeed','doNotCacheResponse']);
Route::get('blog/categories/{category}', [PostsController::class,'category'])->name('blog.category')->middleware('pagespeed');
Route::get('blog/tags/{tag}', [PostsController::class,'tag'])->name('blog.tag')->middleware('pagespeed');
Auth::routes();

Route::middleware(['auth','pagespeed','doNotCacheResponse'])->group(function (){
    Route::resource('posts', PostsController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('tags', TagsController::class);
    Route::get('trashed-posts', [PostsController::class, 'trashed'])->name('trashed-posts.index');
    Route::put('restore-post/{post}', [PostsController::class, 'restore'])->name('restore-posts');

});

Route::middleware(['auth','admin','doNotCacheResponse'])->group(function(){
    Route::get('users/profile', [UsersController::class,'edit'])->name('users.edit-profile');
    Route::put('users/profile', [UsersController::class,'update'])->name('users.update-profile');
    Route::get('users',[UsersController::class,'index'])->name('users.index');
    Route::post('users/{user}/make-admin', [UsersController::class, 'makeAdmin'])->name('users.make-admin');
});
