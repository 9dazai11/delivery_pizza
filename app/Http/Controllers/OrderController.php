<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PizzaOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'comment' => 'nullable|string',
        ]);
        
        $order = Order::create($request->all());

        PizzaOrder::where('order_id', null)->update(['order_id' => $order->id]);

        return response()->json(['message' => 'Заказ успешно оформлен']);
    }
}
