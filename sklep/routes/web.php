<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserPanelController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/',[ProductController::class,'showAll']);
Route::get('/products/{category:slug}/{product:slug}',[ProductController::class,'showProduct']);

Route::get('/register',[RegisterController::class,'show']);
Route::post('/register',[RegisterController::class,'register']);

Route::get('/login',[LoginController::class,'show'])->name('login');
Route::post('/login',[LoginController::class,'login']);

Route::post('/logout',function ()
{
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
});

Route::get('/cart',[CartController::class,'show'])->middleware('auth');
Route::post('/cart',[CartController::class,'add'])->middleware('auth');
Route::delete('/cart/{item}',[CartController::class,'remove'])->middleware('auth')->name('cart.remove');
Route::patch('/cart/{item}',[CartController::class,'update'])->middleware('auth')->name('cart.update');

Route::post('/order',[OrderController::class,'store'])->middleware('auth');

Route::get('/account',[UserPanelController::class,'show'])->middleware('auth');

Route::get('/orders',[OrderController::class,'index'])->middleware('auth');
Route::get('/orders/{order}', [OrderController::class,'show'])->middleware('auth');

Route::prefix('admin')->middleware(['auth','role.admin'])->group(function(){
    Route::get('/',[AdminController::class,'index']);
    Route::get('/products',[AdminProductController::class,'index'])->name('products.index');
    Route::get('/products/add',[AdminProductController::class,'add'])->name('products.add');
    Route::post('/products/add',[AdminProductController::class,'insert'])->name('products.insert');
    Route::get('/products/{product}/edit',[AdminProductController::class,'edit'])->name('products.edit');
    Route::delete('/products/{product}',[AdminProductController::class,'remove'])->name('products.remove');
    Route::put('/products/{product}',[AdminProductController::class,'update'])->name('products.update');


    Route::get('/categories',[AdminCategoryController::class,'index'])->name('categories.index');
    Route::post('/categories',[AdminCategoryController::class,'insert'])->name('categories.insert');
    Route::get('/orders',[AdminOrderController::class,'index'])->name('orders.index');
    
});



