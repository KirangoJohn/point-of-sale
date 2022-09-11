<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PDFController;



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
Route::resource('company', 'CompanyController');
Route::resource('products', 'ProductsController');
Route::get('pos', [ProductsController::class, 'index'])->name('pos');  
Route::get('cart', [ProductsController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductsController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove.from.cart');
Route::post('/order', [ProductsController::class, 'confirmorder']);
Route::post('/cancelorder', [ProductsController::class, 'cancelorder']);


Route::resource('stocks', 'StockController');
Route::resource('items', 'ItemController');
Route::resource('salesreports', 'SalesReportController');
Route::resource('purchases', 'PurchaseController');
///Route::resource('tests', 'TestController');


//Route::post('/', [StockController::class, 'stocks'])->name('stocks/create'); 
Route::get('report/receipt', [ReceiptController::class, 'index'])->name('receipt');
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);




Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout',[AuthController::class, 'logout'])->name('logout');
//Route::get('register',[AuthController::class, 'register'])->name('register');

Route::group(['middleware'=>'auth'], function () {
	Route::get('permissions-all-users',['middleware'=>'check-permission:user|admin|superadmin','uses'=>'HomeController@allUsers']);
	Route::get('permissions-admin-superadmin',['middleware'=>'check-permission:admin|superadmin','uses'=>'HomeController@adminSuperadmin']);
	Route::get('permissions-superadmin',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@superadmin']);
});
