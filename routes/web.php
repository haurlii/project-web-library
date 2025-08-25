<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\BookUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanBookController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\StockBookController;
use App\Http\Controllers\ReturnBookController;
use App\Http\Controllers\FineSettingController;
use App\Http\Controllers\LoanBookUserController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\ReturnBookUserController;
use App\Http\Controllers\ReturnBookCheckController;


Route::middleware('guest')->group(function () {
    Route::controller(AuthenticationController::class)->group(function () {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store')->name('login.store');
    });
});

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::controller(DashboardAdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('admin.dashboard');
    });

    Route::controller(UploadController::class)->group(function () {
        Route::post('/dashboard/upload-avatar', [UploadController::class, 'uploadAvatar'])->name('admin.upload.avatar');
        Route::post('/dashboard/upload-cover', [UploadController::class, 'uploadCover'])->name('admin.upload.cover');
        Route::post('/dashboard/upload-logo', [UploadController::class, 'uploadLogo'])->name('admin.upload.logo');
    });

    // Penulis buku
    Route::controller(AuthorController::class)->group(function () {
        Route::get('/dashboard/authors', 'index')->name('admin.authors.index');
        Route::post('/dashboard/authors', 'store')->name('admin.authors.store');
        Route::patch('/dashboard/authors/{author:slug}', 'update')->name('admin.authors.update');
        Route::delete('/dashboard/authors/{author:slug}', 'destroy')->name('admin.authors.destroy');
    });

    // Penerbit buku
    Route::controller(PublisherController::class)->group(function () {
        Route::get('/dashboard/publishers', 'index')->name('admin.publishers.index');
        Route::post('/dashboard/publishers', 'store')->name('admin.publishers.store');
        Route::patch('/dashboard/publishers/{publisher:slug}', 'update')->name('admin.publishers.update');
        Route::delete('/dashboard/publishers/{publisher:slug}', 'destroy')->name('admin.publishers.destroy');
    });

    // Kategori buku
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/dashboard/categories', 'index')->name('admin.categories.index');
        Route::post('/dashboard/categories', 'store')->name('admin.categories.store');
        Route::patch('/dashboard/categories/{category:slug}', 'update')->name('admin.categories.update');
        Route::delete('/dashboard/categories/{category:slug}', 'destroy')->name('admin.categories.destroy');
    });

    // Buku
    Route::controller(BookController::class)->group(function () {
        Route::get('/dashboard/books', 'index')->name('admin.books.index');
        Route::post('/dashboard/books', 'store')->name('admin.books.store');
        Route::patch('/dashboard/books/{book:slug}', 'update')->name('admin.books.update');
        Route::delete('/dashboard/books/{book:slug}', 'destroy')->name('admin.books.destroy');
    });

    // Stok buku
    Route::controller(StockBookController::class)->group(function () {
        Route::get('/dashboard/stock-books', 'index')->name('admin.stock-books.index');
        Route::patch('/dashboard/stock-books/{stock_book}', 'update')->name('admin.stock-books.update');
    });

    // Transaksi peminjaman buku
    Route::controller(LoanBookController::class)->group(function () {
        Route::get('/dashboard/loan-books', 'index')->name('admin.loan-books.index');
        Route::post('/dashboard/loan-books', 'store')->name('admin.loan-books.store');
    });

    // Transaksi pengembalian buku
    Route::controller(ReturnBookController::class)->group(function () {
        Route::get('/dashboard/return-books', 'index')->name('admin.return-books.index');
        Route::get('/dashboard/loan-books/{loan_book}', 'getLoanBook')->name('admin.loan-books.getLoanBook');
        Route::post('/dashboard/return-books', 'store')->name('admin.return-books.store');
    });

    // Cek pengembalian buku
    Route::controller(ReturnBookCheckController::class)->group(function () {
        Route::post('/dashboard/return-book-checks', 'store')->name('admin.return-book-checks.store');
    });

    // Pengguna
    Route::controller(UserController::class)->group(function () {
        Route::get('/dashboard/users', 'index')->name('admin.users.index');
        Route::post('/dashboard/users', 'store')->name('admin.users.store');
        Route::patch('/dashboard/users/{user}', 'update')->name('admin.users.update');
        Route::delete('/dashboard/users/{user}', 'destroy')->name('admin.users.destroy');
        // Profile admin
        Route::get('/dashboard/profiles', 'editAdmin')->name('admin.profiles');
        Route::patch('/dashboard/profiles', 'updateAdmin')->name('admin.profiles.update');

        // Profile user
        Route::get('/profiles', 'editUser')->name('user.profiles');
        Route::patch('/profiles', 'updateUser')->name('user.profiles.update');
    });

    Route::controller(FineController::class)->group(function () {
        Route::patch('/dashboard/fines/{fine}', 'update')->name('admin.fines.update');
    });

    // Pengaturan denda
    Route::controller(FineSettingController::class)->group(function () {
        Route::get('/dashboard/fine-settings', 'index')->name('admin.fine-settings.index');
        Route::patch('/dashboard/fine-settings/{fineSetting}', 'update')->name('admin.fine-settings.update');
    });

    // Buku user
    Route::controller(BookUserController::class)->group(function () {
        Route::get('/books', 'index')->name('user.books.index');
    });
    // Transaksi peminjaman buku user
    Route::controller(LoanBookUserController::class)->group(function () {
        Route::get('/loan-books', 'index')->name('user.loan-books.index');
        Route::post('/loan-books', 'store')->name('user.loan-books.store');
    });

    // Transaksi pengembalian buku user
    Route::controller(ReturnBookUserController::class)->group(function () {
        Route::get('/return-books', 'index')->name('user.return-books.index');
        Route::get('/loan-books/{loan_book}', 'getLoanBook')->name('user.loan-books.getLoanBook');
        Route::post('/return-books', 'store')->name('user.return-books.store');
    });

    Route::controller(AuthenticationController::class)->group(function () {
        Route::post('/logout', 'destroy')->name('logout');
    });
});
