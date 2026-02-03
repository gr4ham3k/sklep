<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:255',
            'surname' => 'required|string|min:1|max:255',
            'city' => 'required|string|min:1|max:255',
            'street' => 'required|string|min:1|max:255',
            'postcode' => 'required|string|min:1|max:255',
            'telephone' => 'required|string|min:1|max:255',
            'house_number' => 'required|string|min:1|max:255',
            'apartment_number' => 'nullable|string|min:1|max:255',
        ]);

        $cart = Cart::with('items.product')
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($cart->items->isEmpty()) {
            return back()->with('error', 'Koszyk jest pusty!');
        }

        DB::transaction(function () use ($request,$cart) {

            $address = Address::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'surname' => $request->surname,
                'city' => $request->city,
                'street' => $request->street,
                'postcode' => $request->postcode,
                'phone' => $request->telephone,
                'house_number' => $request->house_number,
                'apartment_number' => $request->apartment_number,
            ]);


            $total = $cart->items->sum(function ($item) {
                return $item->quantity * $item->product->price;
            });

            $order = Order::create([
                'user_id' => Auth::id(), 
                'address_id' => $address->id,
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
