<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavorisController;

// Route::get('/', function () {
//     return view('products');
// });

Route::get('/', [ProductController::class , 'index'])->name('home');  
Route::get('/categorie/{category}', [ProductController::class , 'category'])->name('category');
Route::get('/admin', [ProductController::class , 'admin'])->name('admin');
Route::post('/addProduct', [ProductController::class , 'addProduct'])->name('addProduct'); 
Route::get('/removeProduct/{product}', [ProductController::class , 'removeProduct'])->name('removeProduct');
Route::put('/editProduct', [ProductController::class , 'editProduct'])->name('editProduct'); 
Route::get('/search/{user}', [ProductController::class , 'productSearch'])->name('productSearch');
Route::get('/favoris', [FavorisController::class , 'favoris'])->name('favoris');


// when edit or insert into the data base, We use POST
// when we get things from the database, We user GET


require_once "auth.php";