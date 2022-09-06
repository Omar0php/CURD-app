<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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


Route::resource('products', ProductController::class);

Route::get('products/product/{id}/trash',[ProductController::class,'softDelete'])->name('trash');
Route::get('product/trash',[ProductController::class,'getTrashedProducts'])->name('trashedProducts');
Route::get('product/restore/{id}',[ProductController::class,'restoreProductTrashed'])->name('restoreeProducts');
Route::get('product/force/delete/{id}',[ProductController::class,'deleteProductFromRoot'])->name('force.delet');


