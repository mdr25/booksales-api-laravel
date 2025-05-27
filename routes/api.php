<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;

// Public routes
Route::get('genres', [GenreController::class, 'index']);
Route::get('genres/{genre}', [GenreController::class, 'show']);
Route::get('authors', [AuthorController::class, 'index']);
Route::get('authors/{author}', [AuthorController::class, 'show']);
Route::get('books', [BookController::class, 'index']);
Route::get('books/{book}', [BookController::class, 'show']);

// Authenticated user
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('transactions', [TransactionController::class, 'store']);
    Route::get('transactions/{transaction}', [TransactionController::class, 'show']);
    Route::put('transactions/{transaction}', [TransactionController::class, 'update']);
    Route::patch('transactions/{transaction}', [TransactionController::class, 'update']);
});

// Admin routes
Route::middleware(['auth:sanctum', 'is_admin'])->group(function () {
    // Genre
    Route::post('genres', [GenreController::class, 'store']);
    Route::put('genres/{genre}', [GenreController::class, 'update']);
    Route::patch('genres/{genre}', [GenreController::class, 'update']);
    Route::delete('genres/{genre}', [GenreController::class, 'destroy']);

    // Author
    Route::post('authors', [AuthorController::class, 'store']);
    Route::put('authors/{author}', [AuthorController::class, 'update']);
    Route::patch('authors/{author}', [AuthorController::class, 'update']);
    Route::delete('authors/{author}', [AuthorController::class, 'destroy']);

    // Book
    Route::post('books', [BookController::class, 'store']);
    Route::put('books/{book}', [BookController::class, 'update']);
    Route::patch('books/{book}', [BookController::class, 'update']);
    Route::delete('books/{book}', [BookController::class, 'destroy']);

    // Transaction
    Route::get('transactions', [TransactionController::class, 'index']);
    Route::delete('transactions/{transaction}', [TransactionController::class, 'destroy']);
});
