<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Thank;

class AboutController extends Controller
{
    public function index()
    {

        $reviews = Review::all();
        $thanks = Thank::all();

        // Возвращаем представление 'about'
        return view('about', compact('reviews', 'thanks'));
    }
}
