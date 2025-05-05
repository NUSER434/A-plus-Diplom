<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Review;
use App\Models\Thank;
use App\Models\Portfolio;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // Получаем данные слайдера
        $sliders = Slider::all();

        // Получаем 7 случайных записей из таблицы portfolios
        $portfolios = Portfolio::inRandomOrder()->take(7)->get();

        // Получаем популярные услуги
        $popularServices = Service::whereIn('name', [
            'Визитки - Дешевые',
            'Печать билетов',
            'Печать блокнотов',
            'Печать бейджей'
        ])->get();

        // Получаем специальные предложения
        $specialServices = Service::whereIn('name', [
            'Свитшоты',
            'Стикерпаки',
            'Карманные календари',
            'Печать флаеров'
        ])->get();

        $reviews = Review::all();
        $thanks = Thank::all();

        // Дополнительные данные (если нужны)
        $otherData = [
            'title' => 'Добро пожаловать!',
            'description' => 'Это главная страница нашего сайта.',
        ];


        // Передаем данные в представление
        return view('home', compact('popularServices', 'specialServices', 'reviews', 'thanks', 'sliders', 'otherData', 'portfolios',));
    }

    public function submitReview(Request $request)
        {
            // Проверяем авторизацию
            if (!Auth::check()) {
                return back()->withErrors(['error' => 'Вы не авторизованы. Пожалуйста, войдите или зарегистрируйтесь.']);
            }

            $user = Auth::user();

            // Валидация данных
            $validated = $request->validate([
                'rating' => 'required|numeric|min:1|max:5', // Оценка от 1 до 5
                'review' => 'required|string', // Текст отзыва
            ]);

            // Создание отзыва
            Review::create([
                'user_id' => $user->id, // ID авторизованного пользователя
                'avatar' => $user->avatar ?? null, // Аватарка из профиля пользователя
                'name' => $user->first_name . ' ' . $user->last_name, // Имя пользователя
                'rating' => $validated['rating'], // Оценка
                'review' => $validated['review'], // Текст отзыва
                'source' => 'Отзыв с сайта', // Источник отзыва
            ]);

            return back()->with('success', 'Спасибо за ваш отзыв!');
        }
    
}
