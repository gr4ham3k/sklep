<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

    class CartController extends Controller
    {
        public function show()
        {
            $cart = Cart::with('items.product')->where('user_id',Auth::id())->first();

            $total = 0;
            if($cart)
            {
                $total = $cart->items->sum(function($item){
                    return $item->quantity * $item->product->finalPrice();
                });

                $total = number_format($total,2,',',' ');
            }

            return view('pages.cart',compact('cart','total'));
        }

        public function add(Request $request)
        {

            $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1',
            ]);

            $product = Product::findOrFail($request->product_id);

            $cart = Cart::firstOrCreate([
                'user_id' => Auth::id(),
            ]);

            $cart_item = $cart->items()
                ->where('product_id',$product->id)
                ->first();
            
            $currentQuantity = $cart_item ? $cart_item->quantity : 0;
            $newQuantity = $currentQuantity + $request->quantity;

            if($newQuantity > $product->stock_quantity)
            {
                return back()->with('error','Brak wystarczającej ilości w magazynie.');
            }
            
            if($cart_item)
            {
                $cart_item->update([
                    'quantity' => $newQuantity,
                ]);
            } else{
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => $request->quantity,
                ]);
            }

            return back()->with('success', 'Dodano do koszyka!');
        }

        public function remove(CartItem $item)
        {
            if($item->cart->user_id != Auth::id())
            {
                abort(403);
            }

            $item->delete();

            return back()->with('success','Produkt usunięty z koszyka!');
        }

        public function update(CartItem $item, Request $request)
        {
            if($item->cart->user_id != Auth::id())
            {
                abort(403);
            }

            $request->validate([
                'quantity' => 'required|integer|min:1'
            ]);

            $item->update([
                'quantity' => $request->quantity
            ]);

            return back();
        }

        
    }
?>