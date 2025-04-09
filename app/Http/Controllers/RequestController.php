<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Request as RequestModel;

class RequestController extends Controller
{
    public function showForm()
    {
        return view('home-sect.popularity.choose');
    }

    public function submitForm(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'file' => 'nullable|file|mimes:pdf|max:2048', // Только PDF, максимум 2 МБ
        ]);

        // Обработка файла
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
        }

        // Создание записи в базе данных
        $requestData = [
            'user_id' => Auth::id(), // Если пользователь авторизован
            'first_name' => Auth::user()->first_name, // Используем first_name из таблицы users
            'email' => $validated['email'],
            'message' => $validated['message'],
            'file_path' => $filePath,
        ];

        RequestModel::create($requestData);

        return redirect()->back()->with('success', 'Ваш запрос успешно отправлен!');
    }
}
