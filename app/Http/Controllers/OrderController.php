<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PizzaOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'comment' => 'nullable|string|max:500',
        ]);
        
        $order = Order::create($request->all());

        PizzaOrder::where('order_id', null)->update(['order_id' => $order->id]);

        return response()->json(['message' => 'Заказ успешно оформлен']);
    }
}
