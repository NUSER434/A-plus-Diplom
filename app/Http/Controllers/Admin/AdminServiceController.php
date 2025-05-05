<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class AdminServiceController extends Controller
{
    // Список услуг
    public function index()
    {
        $services = Service::all();
        return view('admin.services', compact('services'));
    }

    // Добавление услуги
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|url', // Можно использовать файловое поле
            'slug' => 'required|string|max:255|unique:services',
        ]);

        Service::create($validated);

        return back()->with('success', 'Услуга успешно добавлена');
    }

    // Обновление услуги
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|url',
            'slug' => 'required|string|max:255|unique:services,slug,' . $service->id,
        ]);

        $service->update($validated);

        return back()->with('success', 'Данные услуги успешно обновлены');
    }

    // Удаление услуги
    public function destroy(Request $request, Service $service)
    {
        if ($request->input('confirmation') !== 'DELETED') {
            return back()->withErrors(['confirmation' => 'Для подтверждения удаления введите "DELETED"']);
        }

        $service->delete();

        return back()->with('success', 'Услуга успешно удалена');
    }
}
