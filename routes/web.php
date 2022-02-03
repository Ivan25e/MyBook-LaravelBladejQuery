<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SearchController;

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
    return view('home');
})->name('home');

Route::get('/register', function () {
    return view('users.register');
})->name('register');

Route::get('/login', function () {
    return view('users.login');
})->name('login');

Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

Route::post('/user/login', [UserController::class, 'login'])->name('user.login');

Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('/user/profile', [BookController::class, 'index'])->name('user.profile');

Route::get('/book/create', [BookController::class, 'create'])->name('book.create');

Route::post('/book/store', [BookController::class, 'store'])->name('book.store');

Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name('book.edit');

Route::post('/book/update/{id}', [BookController::class, 'update'])->name('book.update');

Route::get('/book/destroy/{id}', [BookController::class, 'destroy'])->name('book.destroy');

Route::get('/book/{id}', [BookController::class, 'show'])->name('book.show');

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/search/results', [SearchController::class, 'results'])->name('search.results');