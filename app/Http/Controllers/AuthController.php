<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Показать форму авторизации
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Авторизация
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('home'); // Явно указываем маршрут 'home'
        }

        return back()->withErrors(['email' => 'Неверные данные']);
    }

    

    // Выход
    public function logout()
    {
        Auth::logout();
        return redirect()->route('/');
    }
}
