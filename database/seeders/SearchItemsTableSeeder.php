<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SearchItem;

class SearchItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'Портфолио', 'url' => '/portfolio'],
            ['name' => 'Все услуги', 'url' => '/all-services'],
            ['name' => 'Главная страница', 'url' => '/'],
            ['name' => 'О нас', 'url' => '/about'],
            ['name' => 'Контакты', 'url' => '/contacts'],
            ['name' => 'Визитки - Квадратные', 'url' => '/all-services/vizitki-kvadratnye'],
            ['name' => 'Визитки - Дешевые', 'url' => '/all-services/vizitki-desevye'],
            ['name' => 'Визитки - с ламинацией', 'url' => '/all-services/vizitki-s-laminaciei'],
            ['name' => 'Печать флаеров', 'url' => '/all-services/pecat-flaerov'],
            ['name' => 'Печать бирок', 'url' => '/all-services/pecat-birok'],
            ['name' => 'Печать билетов', 'url' => '/all-services/pecat-biletov'],
            ['name' => 'Печать бейджей', 'url' => '/all-services/pecat-beidzei'],
            ['name' => 'Футболки', 'url' => '/all-services/futbolki'],
            ['name' => 'Свитшоты', 'url' => '/all-services/svitsoty'],
            ['name' => 'Настольные календари', 'url' => '/all-services/nastolnye-kalendari'],
            ['name' => 'Карманные календари', 'url' => '/all-services/karmannye-kalendari'],
            ['name' => 'Квадратные календари', 'url' => '/all-services/kvadratnye-kalendari'],
            ['name' => 'Стикерпаки', 'url' => '/all-services/stikerpaki'],
            ['name' => 'Печать блокнотов', 'url' => '/all-services/pecat-bloknotov'],
            ['name' => 'Печать каталогов', 'url' => '/all-services/pecat-katalogov'],
            // Добавьте остальные элементы из вашего массива
        ];

        foreach ($items as $item) {
            SearchItem::create($item);
        }
    }

}
