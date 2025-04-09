<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    public function run()
    {
        Slider::create([
            'image_url' => 'https://avatars.mds.yandex.net/get-altay/5097807/2a00000190fb71ee13200b03a3a7dde0e1f4/XXXL',
            'title' => 'Ваша типография в самом центре города',
            'subtitle' => 'Мы находимся в удобной транспортной развязке, с парковкой и простым доступом. Приезжайте к нам лично – обсудим ваш заказ за чашкой кофе или сразу заберёте готовую продукцию.',
            'button_text' => 'Узнать больше',
            'button_link' => 'contacts',
        ]);

        Slider::create([
            'image_url' => 'https://icolorit.ru/wp-content/uploads/poligrafia-1024x681.jpg',
            'title' => 'Наши работы – качество, которым гордимся',
            'subtitle' => 'Визитки, буклеты, упаковка или крупные рекламные проекты – в нашем портфолио только реальные работы. Убедитесь сами: мы делаем не просто печать, а впечатление.',
            'button_text' => 'Смотреть работы',
            'button_link' => 'portfolio',
        ]);

        Slider::create([
            'image_url' => 'https://diapazon161.ru/wp-content/uploads/2022/09/006-1-2000x1125.webp',
            'title' => 'Полный цикл печатных услуг – от идеи до результата',
            'subtitle' => 'Офсетная и цифровая печать, дизайн, послепечатная обработка – мы предлагаем комплексные решения. Сэкономьте время и бюджет, доверив нам все этапы производства.',
            'button_text' => 'Все услуги',
            'button_link' => 'all-services',
        ]);

        Slider::create([
            'image_url' => 'https://orion-print.org/wp-content/uploads/2017/11/4-min-3.jpg',
            'title' => 'Акции, новинки и полезный контент – в одном клике',
            'subtitle' => 'Подписывайтесь на нашу группу, чтобы первыми узнавать о спецпредложениях, участвовать в розыгрышах и черпать идеи для своих проектов.',
            'button_text' => 'Перейти в группу',
            'button_link' => 'https://vk.com/aplus174',
        ]);
    }
}
