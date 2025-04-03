<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    // Показать страницу профиля
    public function index()
    {
        $user = Auth::user(); // Получаем данные текущего пользователя
        return view('profile', ['user' => $user]);
    }

    // Обновить данные профиля
    public function update(Request $request)
    {
        $user = Auth::user();

        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Максимальный размер файла: 2MB
        ]);

        // Обновляем текстовые данные
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Обработка загрузки аватара
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = '/storage/' . $avatarPath; // Сохраняем путь к аватару
        }

        $user->save();

        return back()->with('success', 'Профиль успешно обновлен!');
    }

    // Удаление аккаунта
    public function delete(Request $request)
    {
        $user = Auth::user();

        // Проверка подтверждения удаления
        if ($request->input('confirmation') !== 'deleted') {
            return back()->withErrors(['confirmation' => 'Подтверждение не выполнено.']);
        }

        // Удаляем пользователя из базы данных
        $user->delete();

        // Выходим из системы
        Auth::logout();

        return redirect('/')->with('success', 'Аккаунт успешно удален.');
    }
}
