<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\PizzaOrder;
use Illuminate\Http\Request;

class PizzaOrderController extends Controller
{
    public function index()
    {
        $cartItems = PizzaOrder::with('pizza')->where('order_id', null)->get();
        return response()->json($cartItems);
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $pizza = Pizza::find($request->input('pizza_id'));

        $cartItem = PizzaOrder::where('pizza_id', $pizza->id)->where('order_id', null)->first();

        if ($cartItem) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + $request->input('quantity'),
                'total_price' => $cartItem->quantity * $pizza->price,
            ]);
        } else {
            PizzaOrder::create([
                'pizza_id' => $pizza->id,
                'quantity' => $request->input('quantity'),
                'total_price' => $request->input('quantity') * $pizza->price,
            ]);
        }

        return response()->json(['message' => 'Товар успешно добавлен в корзину']);
    }

    public function updateCartItem(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = PizzaOrder::where('id', $id)->where('order_id', null)->first();

        if (!$cartItem) {
            return response()->json(['message' => 'Товар в корзине не найден'], 404);
        }

        $cartItem->update([
            'quantity' => $request->input('quantity'),
            'total_price' => $request->input('quantity') * $cartItem->pizza->price,
        ]);

        return response()->json(['message' => 'Количество товара в корзине успешно обновлено']);
    }

    public function removeFromCart($id)
    {
        $cartItem = PizzaOrder::findOrFail($id);
        $cartItem->delete();

        return response()->json(['message' => 'Товар успешно удален из корзины']);
    }
}
