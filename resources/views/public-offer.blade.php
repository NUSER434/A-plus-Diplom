
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
            <p class="text-black hover:text-red-500 transition duration-300">Публичная оферта</p>
        </div>
    </section>

    <!-- Заголовок -->
    <div class="mt-[30px]">
        <div class="container mx-auto max-w-[1200px]">
            <h1 class="text-[28px] font-bold text-black hover:text-red-500 transition duration-300">Публичная оферта</h1>
        </div>
    </div>
   
<section class="container mx-auto max-w-[1200px] mt-[30px]">
<p class="mb-4 text-gray-700">
            Настоящий документ является публичной офертой в соответствии со статьёй 435 и пунктом 2 статьи 437 Гражданского кодекса Российской Федерации.
        </p>

        <p class="mb-4 text-gray-700">
            Обращаясь в типографию «А-плюс» с заказом полиграфических услуг, клиент выражает своё согласие с условиями настоящей оферты.
        </p>

        <div class="space-y-8">

            <h2 class="text-2xl font-semibold mt-6">1. Предмет оферты</h2>
            <p class="text-gray-700">
                Предметом оферты является оказание услуг по печати и изготовлению полиграфической продукции в адрес физических и юридических лиц.
            </p>

            <h2 class="text-2xl font-semibold mt-6">2. Условия заключения договора</h2>
            <p class="text-gray-700">
                Заказ считается принятым после подтверждения его менеджером компании. Согласование деталей, сроков и стоимости происходит в процессе общения с менеджером.
            </p>

            <h2 class="text-2xl font-semibold mt-6">3. Оплата услуг</h2>
            <p class="text-gray-700">
                Оплата за услуги производится по факту согласования условий заказа. Возможна как предоплата, так и оплата по факту выполнения работы (для юридических лиц).
            </p>

            <h2 class="text-2xl font-semibold mt-6">4. Ответственность сторон</h2>
            <p class="text-gray-700">
                Типография несёт ответственность за качество выполненных работ в рамках действующего законодательства РФ. Клиент отвечает за предоставление корректного макета и данных для печати.
            </p>

            <h2 class="text-2xl font-semibold mt-6">5. Прочие условия</h2>
            <p class="text-gray-700">
                Все спорные ситуации решаются путём переговоров. В случае нерешения — спор передаётся в суд по месту регистрации ИП или ООО типографии.
            </p>

            <p class="mt-6 text-gray-700">
                © {{ date('Y') }} Типография «А-плюс». Все права защищены.
            </p>

        </div>
</section>
   
   @include('partials.basic.footer')
</body>
</html>