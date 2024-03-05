<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WelcomeController;
use App\Models\Category;

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

//welcome route

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Category Routes

Route::get('/category/create', [CategoryController::class, 'create'])->middleware('auth');
Route::post('/category/store', [CategoryController::class, 'store']);
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');


// Blog Routes

Route::get('/blog/create', [BlogController::class, 'create'])->middleware('auth');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::get('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');


require __DIR__.'/auth.php';
