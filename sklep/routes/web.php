<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/',[ProductController::class,'showAll']);
Route::get('/{category:slug}/{product:slug}',[ProductController::class,'showProduct']);

