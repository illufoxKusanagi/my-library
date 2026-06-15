<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;

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

//untuk menghandle ketika user belum login, namun mencoba membuka link yang seharusnya login terlebih dahulu
Route::get('/bridge', function () {
    return view('bridge', ["title" => "library"]);
})->name('bridge');

//ketika user belum login
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('home', ['title' => 'Please login']);
    });
    Route::get('login', [AuthController::class, 'login']);
    Route::post('login', [AuthController::class, 'authenticating']);

    Route::get('register', [RegisterController::class, 'index']);
    Route::post('register', [RegisterController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);

    //route yang hanya bisa diakses oleh admin
    Route::middleware('only_admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index']);

        //route untuk menghandle category
        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('categories-add', [CategoryController::class, 'add']);
        Route::post('category-add', [CategoryController::class, 'store']);
        Route::get('categories-edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('categories-edit/{slug}', [CategoryController::class, 'update']);
        Route::delete('categories-delete/{slug}', [CategoryController::class, 'delete'])->name('categories.delete');
        Route::get('categories-deleted', [CategoryController::class, 'deletedCategory']);
        Route::put('categories-restore/{slug}', [CategoryController::class, 'restore'])->name('categories.restore');

        //route untuk menghandle buku
        Route::get('books-admin', [BookController::class, 'index']);
        Route::get('book-list', [BookController::class, 'list']);
        Route::get('book-add', [BookController::class, 'add']);
        Route::post('book-add', [BookController::class, 'store']);
        Route::get('book-edit/{slug}', [BookController::class, 'edit']);
        Route::post('book-edit/{slug}', [BookController::class, 'update']);
        Route::delete('book-delete/{slug}', [BookController::class, 'delete']);
        Route::get('book-deleted', [BookController::class, 'deletedBook']);
        Route::put('book-restore/{slug}', [BookController::class, 'restore'])->name('book.restore');

        //route untuk menghandle user
        Route::get('users', [DashboardController::class, 'userView']);
        Route::get('user-detail/{slug}', [DashboardController::class, 'userDetailView']);
        Route::delete('user-delete/{slug}', [DashboardController::class, 'delete']);
        Route::get('user-deleted', [DashboardController::class, 'deletedUser']);
        Route::put('user-restore/{slug}', [DashboardController::class, 'restore']);

        //route untuk menghandle buku
        Route::get('book-rent', [BookRentController::class, 'index']);
        Route::post('book-rent', [BookRentController::class, 'store']);
        Route::get('rent-logs', [DashboardController::class, 'rentLogsView']);
        Route::get('rent-return/{slug}', [BookRentController::class, 'returnBook']);
        Route::post('rent-return/{slug}', [BookRentController::class, 'storeReturnBook']);

        //route untuk menghandle request
        Route::get('requests', [RequestController::class, 'index']);
        Route::get('/rent-accept/{id}', [RequestController::class, 'rentAccept']);
        Route::get('/rent-reject/{id}', [RequestController::class, 'rentReject']);
    });
    //route yang bisa diakses oleh client
    Route::middleware('only_client')->group(function () {
        Route::get('home', [UserController::class, 'profile'])->middleware('only_client');

        Route::get('books', [BookController::class, 'indexClient']);
        Route::get('categories-client', [CategoryController::class, 'indexClient']);
        //route untuk menghandle request
        Route::get('request-rent/{slug}', [RequestController::class, 'requestRent']);
        Route::get('request-return/{slug}', [RequestController::class, 'requestReturn']);
        Route::get('request-rent-list', [RequestController::class, 'requestListClient']);
    });
});
