<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

Route::get('dashboard/products',[ProductController::class,'index'])->name('products.index');
Route::get('dashboard/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('dashboard/products/store',[ProductController::class,'store'])->name('products.store');
Route::get('dashboard/products/edit/{id}',[ProductController::class,'edit'])->name('products.edit');
Route::post('dashboard/products/update/{id}',[ProductController::class,'update'])->name('products.update');
Route::post('dashboard/products/delete/{id}',[ProductController::class,'destroy'])->name('products.destroy');
Route::get('dashboard/products/generatePdf/{id}',[ProductController::class,'generatePDF'])->name('products.generatePdf');

require __DIR__.'/auth.php';
