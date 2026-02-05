<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::latest('id')->get();   
        $categories = Category::all();

        return view('pages.admin-products',compact('products','categories'));
    }

    public function edit(Product $product)
    {
        return view('pages.admin-edit-product',compact('product'));
    }

    public function update()
    {
        //todo

        return back()->with('success', 'Pomyślnie edytowano!');
    }
}
