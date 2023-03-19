<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;

Route::get('/books/create', [BookController::class, 'create'])->name('create');
Route::get('/', [BookController::class, 'index'])->name('index');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('edit');
Route::get('/books/{id}', [BookController::class, 'show'])->name('show');
Route::put('/books/{book}', [BookController::class, 'update'])->name('update');
Route::post('books', [BookController::class, 'store'])->name('store');
Route::get('/search', [BookController::class, 'search'])->name('search');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('destroy');


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
?>
