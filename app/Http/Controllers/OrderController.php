<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'address' => 'required|srting|max:255',
            // 'phone' => 'required|srting|max:255',
            'comment' => 'nullable|string|max:500',
        ]);
        
        Order::create($request->all());

        return response()->json(['message' => 'Order created successfully']);
    }
}
