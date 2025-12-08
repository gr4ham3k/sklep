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
            return view('pages.cart',compact('cart'));
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
    }
?>