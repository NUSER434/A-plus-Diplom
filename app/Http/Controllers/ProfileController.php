<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Request as RequestModel;

class ProfileController extends Controller
{
    // Показать страницу профиля
    public function index()
    {
        $user = Auth::user(); // Получаем данные текущего пользователя
        $requests = RequestModel::where('email', $user->email)->get(); // Загружаем историю запросов
        return view('profile', ['user' => $user, 'requests' => $requests]);
    }

    // Обновить данные профиля (ФИО, телефон)
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Валидация данных
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        // Обновляем данные пользователя
        $user->update($validated);

        return back()->with('success', 'Данные успешно обновлены!');
    }

    // Изменить пароль
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // Валидация данных
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Обновляем пароль
        $user->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        return back()->with('success', 'Пароль успешно изменен!');
    }

    // Изменить email
    public function updateEmail(Request $request)
    {
        $user = Auth::user();

        // Валидация данных
        $validated = $request->validate([
            'new_email' => 'required|email|unique:users,email',
        ]);

        // Обновляем email
        $user->update(['email' => $validated['new_email']]);

        return back()->with('success', 'Email успешно изменен!');
    }

    // Удаление аккаунта
    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        // Проверка подтверждения удаления
        if ($request->input('confirmation') !== 'DELETED') {
            return back()->withErrors(['confirmation' => 'Подтверждение не выполнено.']);
        }

        // Удаляем пользователя из базы данных
        $user->delete();

        // Выходим из системы
        Auth::logout();

        return redirect('/')->with('success', 'Аккаунт успешно удален.');
    }
}
