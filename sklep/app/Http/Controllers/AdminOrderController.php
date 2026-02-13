<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        
        return view('pages.admin-orders',compact('orders'));
    }

    public function show(Order $order)
    {
        return view('pages.admin-order-details',compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,cancelled'
        ]);

        $order->status = $request->status;
        $order->save();

        return back();
    }
}
