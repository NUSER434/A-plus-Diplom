<div>
    <h2 class="text-2xl font-bold text-gray-900 mb-4">Онлайн-Калькулятор для {{ $service->name }}</h2>
    <form id="calculator-form">
        <!-- Динамическая генерация полей -->
        @foreach ($calculatorData[$service->category] as $field => $options)
        <div class="mb-4">
            <p class="font-bold mb-2">{{ $field }}</p>
            <div class="flex gap-4 flex-wrap">
                @foreach ($options as $option => $price)
                <button type="button" 
                    class="calculator-option" 
                    data-field="{{ $field }}" 
                    data-value="{{ $option }}" 
                    data-price="{{ $price }}"
                    onclick="updateCalculator('{{ $field }}', '{{ $option }}', {{ $price }}, this)">
                    {{ $option }}
                </button>
                @endforeach
            </div>
        </div>
        @endforeach

        <!-- Итоговая цена -->
        <div class="mb-4">
            <p class="font-bold mb-2">Итоговая цена:</p>
            <p id="total-price">0 ₽</p>
        </div>

        <!-- Кнопка "В корзину" -->
        <button type="button" class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800 transition-all" 
            onclick="addToCart('{{ csrf_token() }}')">
            В корзину
        </button>
    </form>
</div>

<script>
    // Объект для хранения выбранных параметров
    const calculatorState = {};
    let totalPrice = 0;

    // Функция для обновления состояния калькулятора
    function updateCalculator(field, value, price, button) {
        // Удаляем класс active у всех кнопок с тем же полем
        document.querySelectorAll(`[data-field="${field}"]`).forEach(btn => {
            btn.classList.remove('active');
        });

        // Добавляем класс active к текущей кнопке
        button.classList.add('active');

        if (!calculatorState[field]) {
            calculatorState[field] = { value: null, price: 0 };
        }

        // Убираем старую цену
        totalPrice -= calculatorState[field].price;

        // Обновляем состояние
        calculatorState[field].value = value;
        calculatorState[field].price = price;

        // Добавляем новую цену
        totalPrice += price;

        // Обновляем итоговую цену
        document.getElementById('total-price').textContent = `${totalPrice} ₽`;
    }

    function addToCart() {
    console.log('Кнопка "В корзину" нажата');
    const cartData = {
        service_name: '{{ $service->name }}',
        options: calculatorState,
        quantity: 1, // Можно изменить на выбранное количество
        price: totalPrice,
    };

    fetch('{{ route("cart.add") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify(cartData),
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        updateCartCounter();
    })
    .catch(error => console.error('Ошибка:', error));
}

    // Функция для обновления счетчика товаров
    function updateCartCounter() {
        fetch('{{ route("cart.count") }}')
            .then(response => response.json())
            .then(data => {
                document.querySelector('.cart-counter').textContent = data.count;
            });
    }
</script>