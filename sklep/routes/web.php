<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/',[ProductController::class,'showAll']);
Route::get('/{category:slug}/{product:slug}',[ProductController::class,'showProduct']);
Route::get('/register',[RegisterController::class,'show']);
Route::post('/register',[RegisterController::class,'register']);
Route::get('/login',[LoginController::class,'show']);
Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',function ()
{
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
});
