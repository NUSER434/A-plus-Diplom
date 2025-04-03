<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        Review::create([
            'avatar' => 'https://shapka-youtube.ru/wp-content/uploads/2021/02/prikolnaya-avatarka-dlya-patsanov.jpg',
            'name' => 'Иван Иванов',
            'rating' => 4.7,
            'review' => 'Отличная компания! Все сделали быстро и качественно.',
            'source' => 'Яндекс карты',
        ]);

        Review::create([
            'avatar' => 'https://th.bing.com/th/id/OIP.kzSI-h3Oo1TrgHHozgOPLgHaHa?rs=1&pid=ImgDetMain',
            'name' => 'Мария Петрова',
            'rating' => 5.0,
            'review' => 'Спасибо за профессиональный подход!',
            'source' => '2ГИС',
        ]);

        Review::create([
            'avatar' => 'https://th.bing.com/th/id/OIP.rJF5rju8RUqWm7kKdm-5_wHaHa?rs=1&pid=ImgDetMain',
            'name' => 'Алексей Сидоров',
            'rating' => 4.9,
            'review' => 'Все понравилось, рекомендую!',
            'source' => 'Наш сайт',
        ]);
    }
}
