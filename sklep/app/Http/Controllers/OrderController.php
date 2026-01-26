<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store()
    {
        $cart = Cart::with('items.product')
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($cart->items->isEmpty()) {
            return back()->with('error', 'Koszyk jest pusty!');
        }

        DB::transaction(function () use ($cart) {
            $total = $cart->items->sum(function ($item) {
                return $item->quantity * $item->product->price;
            });

            $order = Order::create([
                'user_id' => Auth::id(),
                'total' => $total,
                'status' => 'pending',
            ]);

            foreach ($cart->items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }

            $cart->items()->delete();
        });

        return redirect('/')->with('success','Zamówienie złożone!');
    }
}
