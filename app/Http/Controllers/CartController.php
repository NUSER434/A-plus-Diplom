<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;

class CartController extends Controller
{
      // Показать страницу корзины
    public function index()
    {
        $cartItems = Cart::all();
        return view('cart', compact('cartItems'));
    }

    // Добавить товар в корзину
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'service_name' => 'required|string',
            'options' => 'required|array',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Cart::create($validated);

        return response()->json(['message' => 'Товар добавлен в корзину']);
    }

    // Оформить заказ
    public function checkout()
    {
        $cartItems = Cart::all();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Корзина пуста');
        }

        foreach ($cartItems as $item) {
            Order::create([
                'service_name' => $item->service_name,
                'options' => $item->options,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        Cart::truncate(); // Очищаем корзину

        return redirect()->route('cart.index')->with('success', 'Заказ оформлен');
    }
}
