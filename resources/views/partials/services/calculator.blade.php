<div class="mt-4 p-4 bg-white rounded-lg">
    <h2 class="text-xl font-bold mb-4">Онлайн-Калькулятор: "{{ $service->category }}"</h2>

    <form id="calculator-form" method="POST" action="{{ route('save.order') }}">
        @csrf
        <input type="hidden" name="service_type" value="{{ $service->category }}">

        <input type="hidden" name="size" id="size-hidden">
        <input type="hidden" name="color" id="color-hidden">
        <input type="hidden" name="paper_type" id="paper-type-hidden">
        <input type="hidden" name="paper_density" id="paper-density-hidden">
        <input type="hidden" name="fabric_type" id="fabric-type-hidden">
        <input type="hidden" name="print_type" id="print-type-hidden">

        <!-- Уникальные параметры для каждой услуги -->
        @if ($service->category === 'Визитки')
            @include('partials.services.vid.business_cards_calculator')
        @elseif ($service->category === 'Листовая полиграфия')
            @include('partials.services.vid.sheet_printing_calculator')
        @elseif ($service->category === 'Одежда')
            @include('partials.services.vid.clothing_calculator')
        @elseif ($service->category === 'Календари')
            @include('partials.services.vid.calendars_calculator')
        @elseif ($service->category === 'Наклейки')
            @include('partials.services.vid.stickers_calculator')
        @elseif ($service->category === 'Многостраничная полиграфия')
            @include('partials.services.vid.multi_page_printing_calculator')
        @endif

        <!-- Количество -->
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 font-bold mb-2">Количество:</label>
            <select name="quantity" id="quantity" class="w-full border border-gray-300 rounded px-3 py-2">
                <option value="10">10</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="250">250</option>
                <option value="500">500</option>
                <option value="custom">Другое</option>
            </select>
            <input type="number" id="custom_quantity" class="hidden w-full border border-gray-300 rounded px-3 py-2 mt-2" placeholder="Введите количество">
        </div>

        <!-- Скрытые поля для цены -->
        <input type="hidden" name="price" id="total-price-hidden">

        <!-- Итоговая цена -->
        <div class="mt-4">
            <p class="text-lg font-bold">Итоговая цена: <span id="total-price">0</span> руб.</p>
        </div>

        <!-- Кнопка отправки -->
        <button type="submit" class="bg-black text-white px-4 py-2 rounded mt-4">Добавить в корзину</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const quantitySelect = document.getElementById('quantity');
    const customQuantityInput = document.getElementById('custom_quantity');
    const totalPriceElement = document.getElementById('total-price');
    const form = document.getElementById('calculator-form');
    const totalPriceHiddenInput = document.getElementById('total-price-hidden');

    // Объект для хранения выбранных параметров
    const selectedOptions = {};

    // Функция обновления цены
    function updateTotalPrice() {
        // Получаем текущее значение количества
        const quantity = quantitySelect.value === 'custom'
            ? parseInt(customQuantityInput.value) || 1 // Если выбрано "custom", берем значение из поля ввода
            : parseInt(quantitySelect.value);         // Иначе берем значение из выпадающего списка

        // Рассчитываем базовую цену на основе выбранных параметров
        let basePrice = calculateBasePrice(selectedOptions);

        // Умножаем базовую цену на количество
        const totalPrice = basePrice * quantity;

        // Обновляем отображаемую цену
        totalPriceElement.textContent = totalPrice.toFixed(2);
    }

    // Обработчик изменения количества
    quantitySelect.addEventListener('change', (e) => {
        if (e.target.value === 'custom') {
            customQuantityInput.classList.remove('hidden');
        } else {
            customQuantityInput.classList.add('hidden');
        }
        // Пересчитываем цену при изменении количества
        updateTotalPrice();
    });

    // Обработчик изменения произвольного количества
    customQuantityInput.addEventListener('input', () => {
        updateTotalPrice();
    });

    // Обработчик изменения параметров
    document.querySelectorAll('.option-input').forEach(input => {
        // Сохраняем изначально выбранный параметр
        selectedOptions[input.name] = input.value;

        input.addEventListener('change', (e) => {
            const optionName = e.target.name;
            const optionValue = e.target.value;

            // Обновляем выбранный параметр
            selectedOptions[optionName] = optionValue;

            // Пересчитываем цену
            updateTotalPrice();
        });
    });

    // Функция расчета базовой цены
    function calculateBasePrice(options) {
        let price = 0;

        // Логика для разных параметров
        if (options.size) {
            if (options.size === '90x50') price += 100;
            if (options.size === '85x55') price += 80;
            if (options.size === 'A4') price += 100;
            if (options.size === 'A3') price += 150;
        }

        if (options.color) {
            if (options.color === 'bw') price += 20;
            if (options.color === 'color') price += 50;
        }

        if (options.paper_type) {
            if (options.paper_type === 'glossy') price += 30;
            if (options.paper_type === 'matte') price += 20;
        }

        if (options.paper_density) {
            if (options.paper_density === '300') price += 50;
            if (options.paper_density === '350') price += 70;
            if (options.paper_density === '80') price += 20;
            if (options.paper_density === '120') price += 30;
        }

        if (options.fabric_type) {
            if (options.fabric_type === 'cotton') price += 50;
            if (options.fabric_type === 'polyester') price += 40;
        }

        if (options.print_type) {
            if (options.print_type === 'screen') price += 80;
            if (options.print_type === 'digital') price += 60;
        }

        if (options.type) {
            if (options.type === 'wall') price += 200;
            if (options.type === 'table') price += 150;
        }

        if (options.material) {
            if (options.material === 'paper') price += 30;
            if (options.material === 'plastic') price += 50;
        }

        if (options.design) {
            if (options.design === 'single-sided') price += 50;
            if (options.design === 'double-sided') price += 80;
        }

        if (options.pages) {
            if (options.pages === '16') price += 100;
            if (options.pages === '32') price += 150;
            if (options.pages === '64') price += 200;
        }

        if (options.binding) {
            if (options.binding === 'soft') price += 50;
            if (options.binding === 'hard') price += 100;
        }

        return price;
    }

    // Обновляем скрытые поля перед отправкой формы
    form.addEventListener('submit', (e) => {
        // Обновляем скрытые поля параметров
        document.getElementById('size-hidden').value = selectedOptions['size'] || '';
        document.getElementById('color-hidden').value = selectedOptions['color'] || '';
        document.getElementById('paper-type-hidden').value = selectedOptions['paper_type'] || '';
        document.getElementById('paper-density-hidden').value = selectedOptions['paper_density'] || '';
        document.getElementById('fabric-type-hidden').value = selectedOptions['fabric_type'] || '';
        document.getElementById('print-type-hidden').value = selectedOptions['print_type'] || '';

        // Обновляем скрытое поле с ценой
        const totalPrice = parseFloat(totalPriceElement.textContent);
        if (isNaN(totalPrice)) {
            alert('Ошибка: Цена не рассчитана.');
            e.preventDefault(); // Отменяем отправку формы
            return;
        }
        totalPriceHiddenInput.value = totalPrice;
    });

    // Вызываем функцию расчета цены при загрузке страницы
    updateTotalPrice();
});
</script>