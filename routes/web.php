<?php

use App\Http\Controllers\Products\ProductController;
use App\Notifications\CreatedProductMailNotification;
use Illuminate\Support\Facades\Auth;
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
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/show/{product}', [ProductController::class, 'show'])->name('product.show');

    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/delete/{product}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::middleware('admin')->group(function (){

    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
