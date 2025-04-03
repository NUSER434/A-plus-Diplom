<!-- Раздел "Наш путь" -->
<section class="max-w-[1200px] mx-auto mt-[75px]">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-[28px] font-bold text-black hover:text-red-500 transition duration-300 ">Наш путь</h2>
                <div class="flex space-x-4 mt-[20px]">
                    <button class="year-button bg-white border border-black px-4 py-2 rounded hover:bg-black hover:text-white transition duration-300" data-year="2013">2013</button>
                    <button class="year-button bg-white border border-black px-4 py-2 rounded hover:bg-black hover:text-white transition duration-300" data-year="2014">2014</button>
                    <button class="year-button bg-white border border-black px-4 py-2 rounded hover:bg-black hover:text-white transition duration-300" data-year="2017">2017</button>
                    <button class="year-button bg-white border border-black px-4 py-2 rounded hover:bg-black hover:text-white transition duration-300" data-year="2024">2024</button>
                </div>
            </div>
            <div class="bg-white rounded-lg">
                <p id="year-content" class="text-gray-600">
                    Нажмите на год, чтобы увидеть информацию.
                </p>
            </div>
        </section>


        <script>
        // Логика для раскрывающихся элементов в разделе "Наши ценности"
        document.querySelectorAll('.accordion-header').forEach(header => {
            header.addEventListener('click', () => {
                const content = header.nextElementSibling;
                content.classList.toggle('hidden');
            });
        });

        // Логика для кнопок в разделе "Наш путь"
        const yearContent = document.getElementById('year-content');
        const yearData = {
            '2013': 'Типография А ПЛЮС начала свою работу в 2013 году. Самыми первыми и постоянными заказами типографии были нанесения фирменного логотипа на специальную одежду и средства индивидуальной защиты, путём переноса специальной плёнки под давлением и при высокой температуре (термопечать или термоперенос ), а так же путём шелкографии). У нас был минимальный набор оборудования: трафаретный станок, термопрес, принтер, режущий плоттер. В компании работало два специалиста. Все заработанные средства вкладывались в развитие, что позволило молодой компании расти быстрыми темпами.',
            '2014': 'Постепенно ТИПОГРАФИЯ А ПЛЮС осваивала разные направления и расширяла спектр услуг различных видов печати, ориентируясь на заказчиков и создавая для них широкий спектр возможностей. Изготовление визиток, широкоформатная печать, услуги дизайна, бланки, объявления, листовки, сувенирная продукция, оформление входных групп, изготовление бегущих строк — все это требует участия квалифицированных специалистов, имеющих опыт работы в самых узких областях полиграфии. Так с увеличением объема предоставляемых услуг расширился наш штат персонала. Менеджер – человек, осуществляющий прием и сортировку заказов, отвечающий за маркетинг. Дизайнер – разрабатывает проекты, подготовку к печати. Печатник – осуществляет трудоемкий процесс работы; Постпечатник– проводит после печатную обработку. Команда монтажников – выезды на объекты, замеры, сборка и монтаж наружной рекламы , повышает трудовые резервы. Бухгалтер - документальное ведение хозяйственного и финансового учета на предприятии.',
            '2017': 'Помимо модернизации производственной базы и расширения штата, был организован склад материалов для производства наружной рекламы, вывесок, световых букв и коробов. Компания постепенно перешла к более совершенному оборудованию, что позволило повысить уровень качества выпускаемой продукции и значительно увеличить объемы производства.',
            '2024': 'Сегодня «А плюс» – широкопрофильная типография в Челябинске, которая обеспечивает надежность, качество и оперативность предоставляемых полиграфических услуг. Наше предприятие оснащено современным оборудованием, которое позволяет делать упор как на качество, так и на объем и скорость изготовления продукции.'
        };

        const yearButtons = document.querySelectorAll('.year-button');
        yearButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Убираем активный класс у всех кнопок
                yearButtons.forEach(btn => btn.classList.remove('active'));
                // Добавляем активный класс текущей кнопке
                button.classList.add('active');

                // Обновляем содержимое
                const year = button.dataset.year;
                yearContent.textContent = yearData[year];
            });
        });

        // Добавляем активный класс первой кнопке по умолчанию
        yearButtons[0].classList.add('active');
        yearContent.textContent = yearData[yearButtons[0].dataset.year];
    </script>

        <style>
            /* Стиль для активной кнопки */
            .year-button.active {
                background-color: black;
                color: white;
            }
        </style>