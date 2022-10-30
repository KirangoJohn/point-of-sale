<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\SalesReportController;




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

Route::post('company/edit/{id}','CompanyController@edit');

Route::resource('stocks', 'StockController');
Route::resource('stockReports', 'StockReportController');
Route::resource('items', 'ItemController');
Route::resource('wholesales', 'WholesaleController');
Route::resource('wholesalestocks', 'WholesaleStockController');
Route::resource('retailstocks', 'RetailStockController');
Route::resource('retails', 'RetailController');
Route::resource('salesreports', 'SalesReportController');
Route::resource('salesbydatereports', 'SalesByDateReportController');
Route::resource('retailsalesbydatereports', 'RetailSalesByDateReportController');
Route::resource('retailsalesreports', 'RetailReportController');
Route::resource('purchases', 'PurchaseController');
Route::resource('expReports', 'ExpReportContoller');
Route::delete('itemsDeleteAll', 'ItemController@deleteAll');

Route::get('salesreports.bydate', [SalesReportController::class, 'bydate'])->name('bydate');
///Route::resource('tests', 'TestController');


//Route::post('/', [StockController::class, 'stocks'])->name('stocks/create');
Route::get('report/receipt', [ReceiptController::class, 'index'])->name('receipt');
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('users', [CustomAuthController::class, 'index'])->name('users');

Route::resource('users', 'CustomAuthController');


Auth::routes();

Route::group(['middleware' => 'auth'], function (){
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

//Route::get('logout',[AuthController::class, 'logout'])->name('logout');
Route::get('register',[App\Http\Auth\RegisterController::class, 'register'])->name('register');

Route::group(['middleware'=>'auth'], function () {
	Route::get('permissions-all-users',['middleware'=>'check-permission:user|admin|superadmin','uses'=>'HomeController@allUsers']);
	Route::get('permissions-admin-superadmin',['middleware'=>'check-permission:admin|superadmin','uses'=>'HomeController@adminSuperadmin']);
	Route::get('permissions-superadmin',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@superadmin']);
});
