<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProductController;
use App\Support\Storage\Contracts\StorageInterface;
use Illuminate\Support\Facades\Route;

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


Route::get('products',[ProductController::class, 'index'])->name('products.index');
Route::get('basket/add/{product}',[BasketController::class, 'add'])->name('basket.add');
Route::get('basket',[BasketController::class, 'index'])->name('basket.index');
Route::post('basket/update/{product}',[BasketController::class, 'update'])->name('basket.update');
Route::get('basket/checkout',[BasketController::class, 'checkoutform'])->name('basket.checkout.form');
Route::post('basket/checkout',[BasketController::class, 'checkout'])->name('basket.checkout');
Route::post('payment/{gateway}/callback', [PaymentController::class, 'verify'])->name('payment.verify');



Route::get('basket/clear', function (){
   resolve(\App\Support\Storage\SessionStorage::class)->clear();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
