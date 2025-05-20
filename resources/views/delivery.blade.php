<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Типография А-Плюс - Главаня страница</title>
    <link rel="icon" type="" href="images/logo.png">
    <link rel="shortcut icon" type="" href="images/logo.png">
</head>
<body>
@include('partials.basic.header')

<!-- Навигация -->
    <section class="mt-12">
        <div class="max-w-[1200px] mx-auto flex items-center space-x-4">
            <a href="{{ route('home') }}" class="text-black hover:text-red-500 transition duration-300">Главная</a>
            <span class="text-gray-400">|</span>
            <p class="text-black hover:text-red-500 transition duration-300">Доставка</p>
        </div>
    </section>

    <!-- Заголовок -->
    <div class="mt-[30px]">
        <div class="container mx-auto max-w-[1200px]">
            <h1 class="text-[28px] font-bold text-black hover:text-red-500 transition duration-300">Доставка и самовывоз</h1>
        </div>
    </div>

<section class="container mx-auto max-w-[1200px] mt-[30px]">

        <!-- Таблица доставки -->
        <div class="overflow-x-auto mt-8">
            <!-- Блок с заголовками -->
        <div class="mt-8 flex text-gray-500 text-sm uppercase tracking-wider font-medium">
            <div style="width: 670px;" class="shrink-0">Тип доставки</div>
            <div style="width: 90px; margin-left: 170px" class="shrink-0">Стоимость</div>
            <div style="width: 155px; margin-left: 85px" class="shrink-0">Сроки</div>
        </div>

        <!-- Строчка 1 -->
        <div class="flex items-start border-t border-gray-200 py-6 ">
            <div style="width: 670px;" class="shrink-0 pr-4">
                <p class="text-xl font-medium">Бесплатная доставка по Челябинску</p>
                <p class="text-lg mt-1">При заказе через корзину сайта от 10 000 рублей</p>
                <p class="text-lg mt-1">При заказе через менеджеров от 20 000 рублей</p>
                <p class="text-base mt-2 text-gray-600">По Челябинску доставка производится с понедельника по пятницу с 12.00 до 18.00. Любые подробности вы сможете уточнить у менеджера.</p>
            </div>
            <div style="width: 90px; margin-left: 170px" class="shrink-0 text-lg font-semibold ">0р</div>
            <div style="width: 155px; margin-left: 85px" class="shrink-0 text-lg">От 1 дня</div>
        </div>

        <!-- Строчка 2 -->
        <div class="flex items-start border-t border-gray-200 py-6 ">
            <div style="width: 670px;" class="shrink-0 pr-4">
                <p class="text-xl font-medium">Доставка продукции курьерской службой</p>
                <p class="text-sm mt-1 text-gray-400">(по Челябинску)</p>
                <p class="text-base mt-2 text-gray-600">Доставка производится с понедельника по субботу с 10.00 до 19.00. В день доставки заказа с вами свяжется курьер для согласования деталей доставки.</p>
            </div>
            <div style="width: 90px; margin-left: 170px" class="shrink-0 text-lg font-semibold">790р</div>
            <div style="width: 155px; margin-left: 85px" class="shrink-0 text-lg">От 1 до 3 дней</div>
        </div>

        <!-- Строчка 3 -->
        <div class="flex items-start border-t border-gray-200 py-6 ">
            <div style="width: 670px;" class="shrink-0 pr-4">
                <p class="text-xl font-medium">Доставка продукции ТК СДЭК "до двери" по России</p>
                <p class="text-base mt-2 text-gray-600">Стоимость доставки в любой регион России Вы сможете рассчитать при оформлении заказа на сайте.</p>
            </div>
            <div style="width: 90px; margin-left: 170px" class="shrink-0 text-lg font-semibold">790р</div>
            <div style="width: 155px; margin-left: 85px" class="shrink-0 text-lg">От 1 до 10 дней</div>
        </div>

        <!-- Строчка 4 -->
        <div class="flex items-start border-t border-b border-gray-200 py-6">
            <div style="width: 670px;" class="shrink-0 pr-4">
                <p class="text-xl font-medium">Пункты самовывоза СДЭК по России</p>
                <p class="text-base mt-2 text-gray-600">Доставка производится в выбранный Вами пункт выдачи заказа. В день доставки заказа в пункт выдачи, с Вами свяжется оператор для согласования деталей доставки.</p>
            </div>
            <div style="width: 90px; margin-left: 170px" class="shrink-0 text-lg font-semibold">790р</div>
            <div style="width: 155px; margin-left: 85px" class="shrink-0 text-lg">От 1 до 10 дней</div>
        </div>

        <!-- Контейнер с предупреждением -->
        <div class="mt-12 mx-auto px-24 py-8 border-2 border-red-500 rounded-lg">
            <h2 class="text-xl font-bold text-red-600 text-center">Сроки доставки не учитывают время выполнения заказа.</h2>
            <p  class="mt-3 text-gray-700">
                Мы доставляем заказы по России силами партнерских транспортных компаний. Стоимость доставки в любой регион России Вы сможете рассчитать при оформлении заказа на сайте.
                Остались вопросы? Звоните по телефону
            </p>
        </div>
</section>

@include('partials.basic.footer')
</body>
</html>