<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    // Главная страница портфолио
    public function index()
    {
        // Получаем все категории
        $categories = Portfolio::distinct()->pluck('category');

        // Получаем первое изображение для каждой категории
        $categoryImages = [];
        foreach ($categories as $category) {
            $image = Portfolio::where('category', $category)->first();
            if ($image) {
                $categoryImages[$category] = $image->image;
            }
        }

        return view('portfolio', compact('categories', 'categoryImages'));
    }

    // Страница категории
    public function show($category)
    {
        $images = Portfolio::where('category', $category)->get();
        return view('portfolio.show', compact('images', 'category'));
    }
}
