<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanBookController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\StockBookController;
use App\Http\Controllers\ReturnBookController;
use App\Http\Controllers\FineSettingController;
use App\Http\Controllers\ReturnBookCheckController;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/login', function () {
    return view('signin');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::post('/users', 'store');
    Route::patch('/users/{user}', 'update');
    Route::delete('/users/{user}', 'destroy');
});

Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'index');
    Route::post('/authors', 'store');
    Route::patch('/authors/{author:slug}', 'update');
    Route::delete('/authors/{author:slug}', 'destroy');
});

Route::controller(PublisherController::class)->group(function () {
    Route::get('/publishers', 'index');
    Route::post('/publishers', 'store');
    Route::patch('/publishers/{publisher:slug}', 'update');
    Route::delete('/publishers/{publisher:slug}', 'destroy');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index');
    Route::post('/categories', 'store');
    Route::patch('/categories/{category:slug}', 'update');
    Route::delete('/categories/{category:slug}', 'destroy');
});

Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'index');
    Route::post('/books', 'store');
    Route::patch('/books/{book:slug}', 'update');
    Route::delete('/books/{book:slug}', 'destroy');
});

Route::controller(StockBookController::class)->group(function () {
    Route::get('/stock-books', 'index');
    Route::patch('/stock-books/{stock_book}', 'update');
});

Route::controller(LoanBookController::class)->group(function () {
    Route::get('/loan-books', 'index');
    Route::post('/loan-books', 'store');
});

Route::controller(ReturnBookController::class)->group(function () {
    Route::get('/return-books', 'index');
    Route::get('/loan-books/{loan_book}', 'getLoanBook');
    Route::post('/return-books', 'store');
});

Route::post('/return-book-checks', [ReturnBookCheckController::class, 'store']);
Route::patch('/fines/{fine}', [FineController::class, 'update']);

Route::controller(FineSettingController::class)->group(function () {
    Route::get('/fine-settings', 'index');
    Route::patch('/fine-settings/{fineSetting}', 'update');
});
