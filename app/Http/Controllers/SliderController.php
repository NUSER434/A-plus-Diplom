<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all(); // Получаем все слайды из базы данных
        return view('partials.home-sect.slider', compact('sliders')); // Передаем данные в представление
    }
}
