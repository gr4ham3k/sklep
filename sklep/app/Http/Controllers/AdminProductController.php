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

    public function update(Product $product,Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:1',
            'slug' => 'required|string|min:1',
            'description' => 'required|string|min:1',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'sale_price' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'sale_start' => 'nullable|date|required_with:sale_end',
            'sale_end' => 'nullable|date|after_or_equal:sale_start|required_with:sale_start',
            'stock_quantity' => 'required|numeric|min:0',

        ]);

        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'sale_start' => $request->sale_start,
            'sale_end' => $request->sale_end,
            'stock_quantity' => $request->stock_quantity,
        ]);

        return back();
    }

    public function remove(Product $product)
    {
        $product->delete();

        return redirect('/')->with('success','Produkt usunięty!');
    }
}
