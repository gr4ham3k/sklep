<?php

    namespace App\Http\Controllers;

    use App\Models\Product;
    use App\Models\Category;
    
    class ProductController extends Controller
    {
        public function showAll()
        {
            $products = Product::all();   
            $categories = Category::all();
            return view('pages.content',compact('products','categories'));
        }

        public function showProduct($category,$slug)
        {
            $product = Product::where('slug',$slug)->firstOrFail();
            return view('pages.product',compact('product'));
            
        }
    }

?>