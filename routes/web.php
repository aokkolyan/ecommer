<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::get('/redirect',[HomeController::class,'redirect']);
Route::post('/logout',[HomeController::class,'logout'])->name('logout');
Route::get('/view-category',[AdminController::class,'viewCategory'])->name('view-category');
Route::post('/create',[AdminController::class,'store'])->name('create-category');
Route::delete('/categories/{category}',[AdminController::class,'destroy'])->name('categories.destroy');
Route::get('/categories',[AdminController::class,'edit'])->name('categories.edit');
Route::put('/categories/update',[AdminController::class,'update'])->name('categories.update');

//Product 
Route::get('/view-product',[AdminController::class,'viewproduct'])->name('product.view');
Route::get('/product-create',[AdminController::class,'create'])->name('product.store');
Route::post('/product-create/create',[AdminController::class,'storeproduct'])->name('product.create');
Route::get('/product_delete/{id}',[AdminController::class,'product_delete']);
Route::get('/product_update/{id}',[AdminController::class,'product_edit']);
Route::post('/product_update/{id}',[AdminController::class,'product_update'])->name('product.update');
Route::get('/product_details/{id}',[AdminController::class,'product_details']);

//Cart
Route::get('cart',[AdminController::class,'cart'])->name('cart');
Route::post('/add-to-cart/{id}',[AdminController::class,'addtocart'])->name('add.to.cart');
Route::get('/remove-cart/{id}',[AdminController::class,'removecart'])->name('remove.cart');

//Orders
Route::get('/cash-order',[AdminController::class,'cashorder'])->name('cash.order');