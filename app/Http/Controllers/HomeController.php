<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SliderController;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Review;
use App\Models\Thank;
use App\Models\Portfolio;

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
        return view('home', compact('popularServices','specialServices','reviews', 'thanks','sliders', 'otherData', 'portfolios'));
    }
}
