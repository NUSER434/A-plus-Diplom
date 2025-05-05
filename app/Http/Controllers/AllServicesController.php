<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Portfolio;

class AllServicesController extends Controller
{
     // Страница со всеми услугами
     public function index()
     {
         // Получаем все категории услуг
         $categories = Service::distinct()->pluck('category');
 
         // Получаем все услуги
         $services = Service::all();
 
         return view('all-services', compact('categories', 'services'));
     }
 
     // Страница отдельной услуги
     public function show($slug)
     {
         // Находим услугу по slug
        $service = Service::where('slug', $slug)->firstOrFail();

        // Получаем случайные услуги (исключая текущую)
        $randomServices = Service::where('id', '!=', $service->id)->inRandomOrder()->take(8)->get();

        // Получаем примеры работ из портфолио по категории услуги
        $portfolios = Portfolio::where('category', $service->category)->get();


        return view('service', compact('service', 'randomServices', 'portfolios'));
     }
}
