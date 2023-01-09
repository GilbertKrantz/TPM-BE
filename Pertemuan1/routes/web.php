<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;
use App\Models\Book;
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

Route::get('/home', [BookController::class, 'index'])->name('home');

Route::post('/send-mail', [MailController::class, 'sendMail']);

Route::patch('/update/{id}', [BookController::class, 'update'])->name('update');

Route::delete('/delete/{id}', [BookController::class, 'delete'])->name(('delete'));

Route::get('/create-category', [CategoryController::class, 'create']);
Route::post('/store-category', [CategoryController::class, 'store']);

Route::middleware(['isAdmin'])->group(function () {
    Route::get('/create-book', [BookController::class, 'create'])->name('create');
    Route::post('/store-book', [BookController::class, 'store'])->name('store');

    Route::get('show-book/{id}', [BookController::class, 'show'])->name('show');

    Route::get('edit-book/{id}', [BookController::class, 'edit'])->name('edit');
});

Route::get('/', function () {
    $books = Book::all();

    return view('welcome', compact('books'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
