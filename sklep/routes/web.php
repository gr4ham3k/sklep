<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/',[ProductController::class,'showAll']);
Route::get('/{category:slug}/{product:slug}',[ProductController::class,'showProduct']);
Route::get('/register',[RegisterController::class,'show']);
Route::post('/register',[RegisterController::class,'register']);
