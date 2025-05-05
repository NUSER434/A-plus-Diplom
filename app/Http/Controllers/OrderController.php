<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Проверка наличия обязательных полей
            if (!$request->has('service_type') || !$request->has('quantity') || !$request->has('price')) {
                \Log::error('Missing required fields in request');
                return redirect()->back()->with('error', 'Необходимо заполнить все поля.');
            }

            // Валидация данных
            $validatedData = $request->validate([
                'service_type' => 'required|string',
                'size' => 'nullable|string',
                'color' => 'nullable|string',
                'paper_type' => 'nullable|string',
                'paper_density' => 'nullable|string',
                'fabric_type' => 'nullable|string', // Необязательное поле
                'print_type' => 'nullable|string', // Необязательное поле
                'quantity' => 'required|integer|min:1|max:10000',
                'price' => 'required|numeric|min:0',
            ]);

            // Логирование валидированных данных
            \Log::info('Validated data:', $validatedData);

            // Получаем ID пользователя (если аутентификация используется)
            $userId = Auth::id();

            // Создаем заказ
            $order = Order::create([
                'user_id' => $userId,
                'service_type' => $validatedData['service_type'],
                'size' => $validatedData['size'] ?? null,
                'color' => $validatedData['color'] ?? null,
                'paper_type' => $validatedData['paper_type'] ?? null,
                'paper_density' => $validatedData['paper_density'] ?? null,
                'fabric_type' => $validatedData['fabric_type'] ?? null, // Используем оператор ??
                'print_type' => $validatedData['print_type'] ?? null, // Используем оператор ??
                'quantity' => $validatedData['quantity'],
                'price' => $validatedData['price'],
            ]);

            \Log::info('Order created successfully:', ['order_id' => $order->id]);

            // Перенаправляем пользователя с сообщением об успехе
            return redirect()->back()->with('success', 'Заказ успешно добавлен в корзину!');
        } catch (\Exception $e) {
            \Log::error('Error creating order:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Ошибка при сохранении заказа.');
        }
    }
}
