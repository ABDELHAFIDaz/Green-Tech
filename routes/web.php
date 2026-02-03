<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('products');
// });

Route::get('/', [ProductController::class , 'index'])->name('home');  
Route::get('/categorie/{category}', [ProductController::class , 'category'])->name('category');
Route::get('/admin', [ProductController::class , 'admin'])->name('admin');
Route::get('/addForm', [ProductController::class , 'addForm'])->name('addForm');
Route::post('/addProduct', [ProductController::class , 'addProduct'])->name('addProduct'); 
Route::get('/removeProduct/{id}', [ProductController::class , 'removeProduct'])->name('removeProduct');
Route::post('/editProduct', [ProductController::class , 'editProduct'])->name('editProduct'); 
Route::get('/search/{user}', [ProductController::class , 'productSearch'])->name('productSearch');