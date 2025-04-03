<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Thank;

class ThankSeeder extends Seeder
{
    public function run()
    {
        $images = [
            'https://enjoyprint.ru/content/sliders/talks/1.jpg',
            'https://enjoyprint.ru/content/sliders/talks/2.jpg',
            'https://enjoyprint.ru/content/sliders/talks/4.jpg',
            'https://enjoyprint.ru/content/sliders/talks/5.jpg',
            'https://enjoyprint.ru/content/sliders/talks/7.jpg',
            'https://enjoyprint.ru/content/sliders/talks/9.jpg',
            'https://enjoyprint.ru/content/sliders/talks/10.jpg',
            'https://enjoyprint.ru/content/sliders/talks/11.jpg',
            'https://enjoyprint.ru/content/sliders/talks/14.jpg',
            'https://enjoyprint.ru/content/sliders/talks/15.jpg',
            'https://enjoyprint.ru/content/sliders/talks/17.jpg',
            'https://enjoyprint.ru/content/sliders/talks/18.jpg',
        ];

        foreach ($images as $image) {
            Thank::create([
                'image' => $image,
            ]);
        }
    }
}
