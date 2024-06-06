<?php

use App\Models\Book;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RentLogsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard2Controller;

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
Route::get('/', [PublicController::class, 'index']);

Route::get('/login', function () {
    return view('Login/login');
})->middleware('auth');

// Route::middleware('guest')->group(function() {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login',[AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register',[AuthController::class, 'registerprocess']);
// });
Route::get('books-list',[PublicController::class,'book']);
Route::get('home',[PublicController::class,'index']);
Route::get('home', [BookController::class, 'index']);

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('only_admin');

    Route::get('books', [BookController::class, 'book'])->middleware('only_admin');
    Route::get('books-add', [BookController::class, 'add'])->middleware('only_admin');
    Route::post('books-add',[BookController::class, 'store'])->middleware('only_admin');
    Route::get('books-edit', [BookController::class, 'edit'])->middleware('only_admin');
    Route::get('books-delete', [BookController::class, 'delete'])->middleware('only_admin');
    Route::get('books-destroy', [BookController::class, 'destroy'])->middleware('only_admin');
    Route::get('books-edit/{slug}', [BookController::class, 'edit'])->middleware('only_admin');
    Route::put('books-edit/{slug}', [BookController::class, 'update'])->middleware('only_admin');
    Route::get('books-delete/{slug}', [BookController::class, 'delete'])->middleware('only_admin');
    Route::get('books-destroy/{slug}', [BookController::class, 'destroy'])->middleware('only_admin');
    Route::get('books-user',[BookController::class, 'user']);

    Route::get('books-request', [BookController::class,'request']);
    Route::post('books-request',[BookController::class,'storerequest']);
    Route::get('books-user2',[BookController::class, 'user2']);
    Route::get('books-user3', [BookController::class, 'request2'])->middleware('only_admin');
    Route::get('books-history', [BookController::class, 'request3'])->middleware('only_admin');
    Route::get('books-edit-request',[BookController::class,"return"])->middleware('only_admin');
    Route::post('books-edit-request',[BookController::class,'saveReturnBook'])->middleware('only_admin');

    Route::get('book-rent', [BookRentController::class,'index'])->middleware('only_admin');
    Route::post('book-rent', [BookRentController::class,'store'])->middleware('only_admin');
    Route::get('book-return', [BookRentController::class,'return'])->middleware('only_admin');
    Route::post('book-return', [BookRentController::class,'saveReturnBook'])->middleware('only_admin');
    
    Route::get('kategori', [CategoryController::class, 'index'])->middleware('only_admin');
    Route::get('kategori-add', [CategoryController::class, 'add'])->middleware('only_admin');
    Route::post('kategori-add',[CategoryController::class, 'store'])->middleware('only_admin');
    Route::get('kategori-edit/{slug}', [CategoryController::class, 'edit'])->middleware('only_admin');
    Route::put('kategori-edit/{slug}', [CategoryController::class, 'update'])->middleware('only_admin');
    Route::get('kategori-delete/{slug}', [CategoryController::class, 'delete'])->middleware('only_admin');
    Route::get('kategori-destroy/{slug}', [CategoryController::class, 'destroy'])->middleware('only_admin');

    Route::get('users', [UserController::class, 'index'])->middleware('only_admin');
    Route::get('users-add', [UserController::class, 'add'])->middleware('only_admin');
    Route::post('users-add',[UserController::class, 'store'])->middleware('only_admin');
    Route::get('users-registered', [UserController::class, 'registered'])->middleware('only_admin');
    Route::get('users-approve/{slug}', [UserController::class, 'approve'])->middleware('only_admin');
    // Route::get('users-edit/{slug}', [UserController::class, 'edit'])->middleware('only_admin');
    // Route::put('users-edit/{slug}', [UserController::class, 'update'])->middleware('only_admin');
    Route::get('users-delete/{slug}', [UserController::class, 'delete'])->middleware('only_admin');
    Route::get('users-destroy/{slug}', [UserController::class, 'destroy'])->middleware('only_admin');

    Route::get('rentlog', [RentLogsController::class, 'index'])->middleware('only_admin');

    Route::get('dashboard2',[Dashboard2Controller::class, 'index'])->middleware('only_admin');
    
    // Route::get('dashboard2',[Dashboard2Controller::class, 'tabel'])->middleware('only_admin');

    // Viz
    // Route::get('grafik')
});
