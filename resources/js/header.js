document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-input');
    const searchResults = document.getElementById('search-results');
    const searchResultsList = searchResults.querySelector('ul');

    // Обработка ввода
    searchInput.addEventListener('input', async () => {
        const query = searchInput.value.trim().toLowerCase();
        if (!query) {
            searchResults.classList.add('hidden');
            return;
        }

        try {
            // Запрос к API
            const response = await fetch(`/api/search?q=${encodeURIComponent(query)}`);
            const matches = await response.json();

            // Отображаем результаты
            if (matches.length > 0) {
                const resultsHTML = matches.map(item => `
                    <li class="p-2 cursor-pointer hover:bg-gray-100" 
                        onclick="window.location.href='/all-services/${item.slug}'">
                        ${item.name}
                    </li>
                `).join('');
                searchResultsList.innerHTML = resultsHTML;
                searchResults.classList.remove('hidden');
            } else {
                searchResultsList.innerHTML = '<li class="p-2">Ничего не найдено</li>';
                searchResults.classList.remove('hidden');
            }
        } catch (error) {
            console.error('Ошибка поиска:', error);
        }
    });

    // Скрытие результатов вне области
    document.addEventListener('click', (e) => {
        const searchInputGroup = document.getElementById('search-input-group');
        if (!searchInputGroup.contains(e.target)) {
            searchResults.classList.add('hidden');
        }
    });
});


