<header
    class="max-w-[1200px] m-auto 2xl:sticky 2xl:top-[10px] z-50 w-full bg-white 2xl:backdrop-blur-3xl text-white flex items-center justify-between 2xl:rounded-3xl sx:absolute">
    <div class="flex items-center justify-between w-full py-4 px-[2.625rem]">
        <!-- Первый блок -->
        <div class="2xl:mr-10 text-black">
            <a href="{{ route('main') }}">лого</a>
        </div>
        <!-- Второй блок -->
        <div class="w-full m-auto lg:max-w-[25rem] sm:max-w-[15rem] sx:max-w-[10rem]">
            <form action="{{ route('catalog.search') }}" method="get"
                  class="relative bg-f9f9f9 border-black border-opacity-5 border-solid border-0.5 w-full">
                <!-- Здесь может быть форма поиска -->
                <input type="text" placeholder="Поиск" name="query"
                       class="pl-5 text-black lg:py-2 sx:py-1 rounded-2xl outline-none lg:max-w-[25rem] sm:max-w-[15rem] sx:max-w-[10rem] w-full header-input-background">
                <button type="submit" class="absolute inset-y-0 right-0 pr-2 flex items-center justify-center">
                    <img src="{{ asset('assets/images/search.svg') }}" alt="Поиск" class="">
                </button>
            </form>
            <div id="search-history" class="mt-4 hidden">
                <h3 class="text-lg font-medium mb-2">История поиска</h3>
                <ul id="search-history-list"></ul>
            </div>
        </div>
        <div class="bg-[#f9f9f9] px-[7px] py-[5px] rounded-3xl">
            @if(auth()->guest() && auth('developer')->guest())
                <!-- Если пользователь не аутентифицирован как обычный пользователь или разработчик -->
                <a href="{{ route('user.login') }}">
                    <img src="{{ asset('assets/images/profile.svg') }}" alt="Профиль" class="">
                </a>
            @elseif(auth('developer')->check())
                <!-- Если пользователь аутентифицирован как разработчик -->
                <a href="{{ route('developer.profile') }}">
                    <img src="{{ asset('assets/images/profile.svg') }}" alt="Профиль" class="">
                </a>
            @elseif(auth()->check())
                <!-- Если пользователь аутентифицирован как обычный пользователь -->
                <a href="{{ route('profile') }}">
                    <img src="{{ asset('assets/images/profile.svg') }}" alt="Профиль" class="">
                </a>
            @endif
        </div>
    </div>
</header>
<script>
    // JavaScript для отображения истории запросов
    document.addEventListener('DOMContentLoaded', function () {
        var searchInput = document.querySelector('input[name="search"]');
        var searchHistoryContainer = document.getElementById('search-history');

        searchInput.addEventListener('input', function () {
            // Отправка AJAX-запроса для получения истории запросов
            fetch('/search/history')
                .then(response => response.json())
                .then(data => {
                    // Отображение истории запросов
                    searchHistoryContainer.innerHTML = '';
                    data.forEach(function (query) {
                        var li = document.createElement('li');
                        li.textContent = query;
                        searchHistoryContainer.appendChild(li);
                    });
                });
        });

        searchInput.addEventListener('blur', function () {
            // Скрытие истории запросов при потере фокуса
            searchHistoryContainer.innerHTML = '';
        });
    });
</script>
