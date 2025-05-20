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
            <p class="text-black hover:text-red-500 transition duration-300">Пользовательское соглашение</p>
        </div>
    </section>

    <!-- Заголовок -->
    <div class="mt-[30px]">
        <div class="container mx-auto max-w-[1200px]">
            <h1 class="text-[28px] font-bold text-black hover:text-red-500 transition duration-300">Пользовательское соглашение</h1>
        </div>
    </div>

   <section class="container mx-auto max-w-[1200px] mt-[30px]">
       <p class="mb-4 text-gray-700">
            Настоящее пользовательское соглашение регулирует использование сайта typography-aplus.ru и всех связанных с ним сервисов, предоставляемых типографией «А-плюс».
        </p>

        <p class="mb-4 text-gray-700">
            Посещая сайт и используя его функционал, вы автоматически принимаете условия данного соглашения.
        </p>

        <div class="space-y-8">

            <h2 class="text-2xl font-semibold mt-6">1. Общие положения</h2>
            <p class="text-gray-700">
                Администрация сайта оставляет за собой право вносить изменения в настоящее соглашение без дополнительного уведомления. Рекомендуется периодически проверять данный раздел.
            </p>

            <h2 class="text-2xl font-semibold mt-6">2. Использование сайта</h2>
            <p class="text-gray-700">
                Пользователь имеет право использовать сайт исключительно в личных целях. Любое копирование материалов сайта без разрешения администрации запрещено.
            </p>

            <h2 class="text-2xl font-semibold mt-6">3. Личные данные</h2>
            <p class="text-gray-700">
                При оформлении заказа или подписке на рассылку вы предоставляете свои контактные данные. Мы гарантируем конфиденциальное хранение вашей информации в соответствии с ФЗ "О персональных данных".
            </p>

            <h2 class="text-2xl font-semibold mt-6">4. Интеллектуальная собственность</h2>
            <p class="text-gray-700">
                Все материалы, размещённые на сайте, включая тексты, изображения и дизайн, являются объектами авторского права и принадлежат типографии «А-плюс».
            </p>

            <h2 class="text-2xl font-semibold mt-6">5. Отказ от ответственности</h2>
            <p class="text-gray-700">
                Информация, размещенная на сайте, может содержать технические неточности. Администрация не несёт ответственности за возможные убытки, возникшие в результате использования материалов сайта.
            </p>

            <p class="mt-6 text-gray-700">
                © {{ date('Y') }} Типография «А-плюс». Все права защищены.
            </p>

        </div>
    </section>
   
   @include('partials.basic.footer')
</body>
</html>