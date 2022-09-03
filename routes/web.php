<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductsController;



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
    return view('welcome');
});

//Route::get('/products', 'App\Http\Controllers\ProductsController@index');

Route::get('pos', [ProductsController::class, 'index'])->name('pos');  
Route::get('cart', [ProductsController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductsController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove.from.cart');
Route::post('/order', [ProductsController::class, 'confirmorder']);

Route::resource('stocks', 'StockController');
Route::resource('purchases', 'PurchaseController');
//Route::post('/', [StockController::class, 'stocks'])->name('stocks/create'); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
