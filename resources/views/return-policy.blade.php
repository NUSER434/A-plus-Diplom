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
            <p class="text-black hover:text-red-500 transition duration-300">Переделка и возврат</p>
        </div>
    </section>

    <!-- Заголовок -->
    <div class="mt-[30px]">
        <div class="container mx-auto max-w-[1200px]">
            <h1 class="text-[28px] font-bold text-black hover:text-red-500 transition duration-300">Переделка и возврат</h1>
        </div>
    </div>  

    <section class="container mx-auto max-w-[1200px] mt-[30px]">

        <p class="mb-4 text-gray-700">
            В типографии «А-плюс» мы стремимся к высокому качеству продукции. Однако если вы остались недовольны результатом выполнения заказа — мы готовы рассмотреть возможность переделки или возврата средств.
        </p>

        <div class="space-y-8">

            <!-- Условия переделки -->
            <div>
                <h2 class="text-2xl font-semibold mb-3">Условия переделки</h2>
                <ul class="list-disc pl-6 space-y-2 text-gray-700">
                    <li>Переделка возможна только при наличии производственного брака.</li>
                    <li>Брак подтверждается фотоотчетом со стороны клиента.</li>
                    <li>Мы обязуемся выполнить повторную печать бесплатно в течение 5 рабочих дней.</li>
                    <li>Если продукция не соответствует согласованному макету — переделка бесплатная.</li>
                </ul>
            </div>

            <!-- Условия возврата -->
            <div>
                <h2 class="text-2xl font-semibold mb-3">Условия возврата</h2>
                <ul class="list-disc pl-6 space-y-2 text-gray-700">
                    <li>Возврат денежных средств возможен только при наличии доказательства производственного брака.</li>
                    <li>Претензии принимаются в течение 3 дней с момента получения заказа.</li>
                    <li>Стоимость доставки не возвращается.</li>
                    <li>Возврат производится тем же способом, которым был оплачен заказ.</li>
                    <li>Срок возврата средств: до 10 рабочих дней с момента принятия решения.</li>
                </ul>
            </div>

            <!-- Как подать заявку -->
            <div>
                <h2 class="text-2xl font-semibold mb-3">Как подать заявку на возврат или переделку?</h2>
                <ol class="list-decimal pl-6 space-y-2 text-gray-700">
                    <li>Напишите нам на почту <a href="mailto:support@aprint.ru" class="text-blue-600 underline">support@aprint.ru</a></li>
                    <li>Опишите проблему и приложите фотографии (если требуется).</li>
                    <li>Дождитесь ответа менеджера и следуйте дальнейшим инструкциям.</li>
                </ol>
            </div>

            <!-- Контакты -->
            <div class="mt-6">
                <p class="text-gray-700">
                    По всем вопросам обращайтесь по телефону: <strong>+7 (495) 123-45-67</strong><br>
                    Или пишите на почту: <a href="mailto:support@aprint.ru" class="text-blue-600 underline">support@aprint.ru</a>
                </p>
            </div>

        </div>
    </section>
   
   @include('partials.basic.footer')
</body>
</html>
