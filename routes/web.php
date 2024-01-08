<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/blogs', [BlogController::class, 'index']) ->name('index');

Route::get('/blogs/create', [BlogController::class, 'create'])->middleware('auth');

Route::get('/blogs/{id}', [BlogController::class, 'show']);

Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');

Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');

Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');

Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');






require __DIR__.'/auth.php';
