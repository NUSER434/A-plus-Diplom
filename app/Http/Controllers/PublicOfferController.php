<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicOfferController extends Controller
{
    public function index()
    {
        return view('public-offer');
    }
}
