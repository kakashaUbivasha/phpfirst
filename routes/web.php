<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\PostController;
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
Route::get('posts', [PostController::class, 'index'])->name('post.index');
Route::get('posts/create', [PostController::class, 'create'])->name('post.create');

Route::post('posts', [PostController::class, 'store'])->name('post.store');
Route::get('posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('posts/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');


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
