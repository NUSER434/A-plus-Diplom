<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portfolio;

class PortfolioSeeder extends Seeder
{
    public function run()
    {
        // Очистка таблицы перед заполнением
        Portfolio::truncate();

        // Массив категорий и соответствующих URL-адресов изображений
        $categories = [
            'Бирка' => [
                'https://sun9-54.userapi.com/impg/iCvuvukof30C_zQq6KZlf2hyiEfcbbnbkOOmeA/FSB8JzvU_eU.jpg?size=1721x2160&quality=96&sign=86e55db298cf656bbc678d33450738c4&type=album',
                'https://sun9-53.userapi.com/impg/WOW3oyKQn9R1Vn50kou_C0W9iQUnWlpO0obcGQ/3hm6E2j_A74.jpg?size=1723x2160&quality=96&sign=7169638fcd2d370844c39a02fbf7d35b&type=album',
                'https://sun9-54.userapi.com/impg/kzIWoFaJ3baMAFLvDGv01MQlywSSp2AshGRHkg/QloM4xA24BY.jpg?size=1722x2160&quality=96&sign=901979631f27aaadd0e8d3f0f01ecd54&type=album',
            ],
            'Бейджи' => [
                'https://sun9-20.userapi.com/impg/FUYQQhLI5oboHLevK-NyX2t8T8DI7hsgb1uaSg/rXf4H75BsbI.jpg?size=1721x2160&quality=96&sign=6d6373dc021c4e5ee18388deffa642fe&type=album',
                'https://sun9-25.userapi.com/impg/c858532/v858532079/156956/iwP73RyGiUU.jpg?size=825x1041&quality=96&sign=90786032e8accd5210e6a106defff8f7&type=album',
                'https://www.badge.ru/inc/articles/efec5.jpg',
            ],
            'Билеты' => [
                'https://th.bing.com/th/id/OIP.vAmATOMaOs3ryKvKWaVtNAHaHa?rs=1&pid=ImgDetMain',
                'https://th.bing.com/th/id/R.fdb631c79455a6a04f801f34f3112aec?rik=qCUcT6LjiUGjPA&pid=ImgRaw&r=0',
                'https://visanow.ru/wp-content/uploads/2019/10/e-ticket.jpg',
            ],
            'Блокноты' => [
                'https://avatars.mds.yandex.net/get-mpic/6340948/img_id4918407281844610368.jpeg/orig',
                'https://th.bing.com/th/id/OIP.XbTJf5U2N3sfB-Qfyz6HOQHaE8?rs=1&pid=ImgDetMain',
                'https://cs5.livemaster.ru/storage/89/9f/fc672b15858620b27074280d0bwg--kantselyarskie-tovary-bloknot-iz-kozhi-kozhanyj-bloknot-blokn.jpg',
            ],
            'Листовки' => [
                'https://artdesign54.ru/wp-content/uploads/2019/06/IMG_0576-e1561748034930.jpg',
                'https://th.bing.com/th/id/OIP.TmRHDvKzF9phU7HRNA_vWQHaFj?rs=1&pid=ImgDetMain',
                'https://ottisk.com/wp-content/uploads/2022/05/Vidy-listovok.png',
            ],
            'Визитки' => [
                'https://sun13-2.userapi.com/impg/c855624/v855624235/22e8ce/08bcqnYZywQ.jpg?size=1721x2160&quality=96&sign=4d4455932c39894cc27a4daf5756d55f&type=album',
                'https://sun9-43.userapi.com/impg/7dDCRA9umhK3xhG1sHmpfO2O62vSsW0oiAsUiA/UpBB_Rse5Y8.jpg?size=1536x1920&quality=96&sign=dff805b83e91a1217879e8814db51559&type=album',
                'https://sun9-48.userapi.com/impg/7RgyojHk22xAhEFwiiO1ReNtBDTg6aAZJ6MNMg/OGyx2-p3gzk.jpg?size=1080x1350&quality=96&sign=429c54c1d107b20f8fa523275f3c737b&type=album',
            ],
            'Футболки' => [
                'https://sun9-4.userapi.com/impg/wWgSuwHEHEJQDunkLOZvdLCdUZ94FxVZwB-Mcw/IN585wyb-uQ.jpg?size=1080x1080&quality=96&sign=938b876a1e2dcfc31c9c07064311a325&type=album',
                'https://th.bing.com/th/id/OIP.3vM8elo4t_DkWdSbURaUzgHaHa?rs=1&pid=ImgDetMain',
                'https://www.ligapechati.ru/wp-content/uploads/2020/03/Iq9cKU42QxU.jpg',
            ],
            'Меню листовое' => [
                'https://www.remenu.ru/portfolio/plovhouse/plovhousemenu101800.jpg',
                'https://www.pechati.net/wp-content/uploads/2022/03/4.jpg',
                'https://www.remenu.ru/portfolio/kanna/kannamenu1011200.jpg',
            ],
        ];

        // Добавление данных в таблицу
        foreach ($categories as $category => $images) {
            foreach ($images as $image) {
                Portfolio::create([
                    'category' => $category,
                    'image' => $image, // Сохраняем URL-адрес изображения
                ]);
            }
        }
    }
}
