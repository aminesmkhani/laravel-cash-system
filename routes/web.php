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




Route::get('basket/clear', function (){
   resolve(StorageInterface::class)->clear();
});
