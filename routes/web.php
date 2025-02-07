<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\Post\DestroyController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'posts'], function () {
    Route::get('/', IndexController::class)->name('post.index');
    Route::get('/create', CreateController::class)->name('post.create');

    Route::post('/', StoreController::class)->name('post.store');
    Route::get('/{post}', ShowController::class)->name('post.show');
    Route::get('/{post}/edit', EditController::class)->name('post.edit');
    Route::patch('/{post}', UpdateController::class)->name('post.update');
    Route::delete('/{post}', DestroyController::class)->name('post.destroy');
});



//Route::get('posts/update', [PostController::class, 'update']);
//Route::get('posts/delete', [PostController::class, 'delete']);
//Route::get('posts/first_or_create', [PostController::class, 'firstOrCreate']);
//Route::get('posts/update_or_create', [PostController::class, 'updateOrCreate']);
Route::get('books', [BookController::class, 'index'])->name('book.index');
Route::get('books/create', [BookController::class, 'create'])->name('book.create');
Route::post('books', [BookController::class, 'store'])->name('book.store');
Route::get('books/{book}', [BookController::class, 'show'])->name('book.show');
Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::patch('books/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('books/{book}', [BookController::class, 'destroy'])->name('book.destroy');
