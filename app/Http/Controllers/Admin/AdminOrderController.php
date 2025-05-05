<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompletedOrder;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = CompletedOrder::with('user')->get();
        return view('admin.orders', compact('orders'));
    }

    public function update(Request $request, CompletedOrder $order)
    {
        \Log::info('До обновления', ['status' => $order->status]);

        $validated = $request->validate([
            'status' => 'required|in:in_progress,final_stages,completed',
        ]);

        $order->update($validated);

        \Log::info('После обновления', ['status' => $order->fresh()->status]);

        return redirect()->route('admin.orders')->with('success', 'Статус успешно обновлен');
    }

    public function destroy(Request $request, CompletedOrder $order)
    {
        if ($request->input('confirmation') !== 'DELETED') {
            return back()->withErrors(['confirmation' => 'Для подтверждения удаления введите "DELETED"']);
        }

        $order->delete();

        return back()->with('success', 'Заказ успешно удален');
    }
}
