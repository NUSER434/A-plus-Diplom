<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\CompletedOrder;

class CartController extends Controller
{
    // Отображение корзины
    public function index()
    {
        $user = Auth::user();
        $orders = $user ? $user->orders : [];
        $totalPrice = $orders->sum('price');

        return view('cart', compact('orders', 'totalPrice'));
    }

    // Удаление выбранных или всех заказов
    public function clear(Request $request)
    {
        $user = Auth::user();

        if ($request->has('selected')) {
            // Удаляем выбранные заказы
            Order::whereIn('id', $request->input('selected'))->delete();
        } else {
            // Удаляем все заказы пользователя
            $user->orders()->delete();
        }

        return redirect()->back()->with('success', 'Корзина очищена.');
    }

    // Оформление выбранных или всех заказов
    public function checkout(Request $request)
    {
        $user = Auth::user();

        if ($request->has('selected')) {
            // Перемещаем выбранные заказы
            $orders = Order::whereIn('id', $request->input('selected'))->get();
        } else {
            // Перемещаем все заказы пользователя
            $orders = $user->orders;
        }

        foreach ($orders as $order) {
            CompletedOrder::create($order->toArray());
            $order->delete();
        }

        return redirect()->back()->with('success', 'Заказ оформлен.');
    }
}
