<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserPanelController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/',[ProductController::class,'showAll']);
Route::get('/{category:slug}/{product:slug}',[ProductController::class,'showProduct']);

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

