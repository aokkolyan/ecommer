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
Route::put('/categories/update/{id}',[AdminController::class,'update'])->name('categories.update');