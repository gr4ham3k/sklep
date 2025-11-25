<?php

    namespace App\Http\Controllers;

    use App\Models\Product;
    use App\Models\Category;
    
    class ProductController extends Controller
    {
        public function show()
        {
            $products = Product::all();   
            $categories = Category::all();
            return view('pages.content',compact('products','categories'));
        }
    }

?>