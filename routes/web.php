<?php

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
use App\Http\Controllers\ProductController1;

Route::get('/', function () {
    return view('welcome');
});
Route::get('products', [ProductController1::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController1::class, 'create'])->name('products.create');
Route::post('products', [ProductController1::class, 'store'])->name('products.store');
Route::get('products/{id}/edit', [ProductController1::class, 'edit'])->name('products.edit');
Route::put('products/{id}', [ProductController1::class, 'update'])->name('products.update');
Route::delete('products/{id}', [ProductController1::class, 'destroy'])->name('products.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
