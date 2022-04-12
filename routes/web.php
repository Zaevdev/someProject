<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DeleteController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/posts', [IndexController::class, '__invoke'])->name('post.index');
Route::get('/posts/create', [CreateController::class, '__invoke'])->name('post.create');
Route::post('/posts', [StoreController::class, '__invoke'])->name('post.store');
Route::get('/posts/{post}', [ShowController::class, '__invoke'])->name('post.show');
Route::get('/posts/{post}/edit', [EditController::class, '__invoke'])->name('post.edit');
Route::patch('/posts/{post}', [UpdateController::class, '__invoke'])->name('post.update');
Route::delete('/posts/{post}', [DeleteController::class, '__invoke'])->name('post.destroy');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, '__invoke'])->name('admin.index');
    Route::get('/post', [\App\Http\Controllers\Admin\Post\IndexController::class, '__invoke'])->name('admin.post.index');
});

//Route::get('/admin', [\App\Http\Controllers\Admin\IndexController::class, '__invoke'])->name('admin.index');
//Route::get('/admin/post', [\App\Http\Controllers\Admin\Post\IndexController::class, '__invoke'])->name('admin.post.index');


Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/main', [MainController::class, 'index'])->name('main.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
