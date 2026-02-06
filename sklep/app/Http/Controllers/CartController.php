<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
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
            $cart = Cart::firstOrCreate([
                'user_id' => Auth::id(),
            ]);

            $cart_item = CartItem::where('cart_id',$cart->id)
                                ->where('product_id',$request->product_id)
                                ->first();
            
            if($cart_item)
            {
                $cart_item->update([
                    'quantity' => $cart_item->quantity + $request->quantity,
                ]);
            } else{
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $request->product_id,
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