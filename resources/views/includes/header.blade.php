<header
    class="max-w-[1200px] m-auto 2xl:sticky 2xl:top-[10px] z-50 w-full bg-white 2xl:backdrop-blur-3xl text-white flex items-center justify-between 2xl:rounded-3xl sx:absolute">
    <div class="flex items-center justify-between w-full py-4 px-[2.625rem]">
        <!-- Первый блок -->
        <div class="2xl:mr-10 text-black">
            <a href="{{ route('main') }}">лого</a>
        </div>
        <!-- Второй блок -->
        <div class="w-full m-auto lg:max-w-[25rem] sm:max-w-[15rem] sx:max-w-[10rem] relative">
            <form id="search-form" action="{{ route('catalog.search') }}" method="get"
                  class="relative bg-f9f9f9 border-black border-opacity-5 border-solid border-0.5 w-full">
                <input type="text" placeholder="Поиск" name="query"
                       class="pl-5 text-black lg:py-2 sx:py-1 rounded-2xl outline-none lg:max-w-[25rem] sm:max-w-[15rem] sx:max-w-[10rem] w-full header-input-background">
                <button type="submit" class="absolute inset-y-0 right-0 pr-2 flex items-center justify-center">
                    <img src="{{ asset('assets/images/search.svg') }}" alt="Поиск" class="">
                </button>
            </form>
            <div id="search-history" class="hidden text-black absolute top-16 left-0 bg-white py-2 px-5 rounded-2xl w-full">
                <h3 class="text-lg font-medium mb-2">История поиска</h3>
                <ul id="search-history-list"></ul>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var searchInput = document.querySelector('input[name="query"]');
                var searchForm = document.getElementById('search-form');
                var searchHistoryContainer = document.getElementById('search-history');
                var searchHistoryList = document.getElementById('search-history-list');

                searchInput.addEventListener('focus', function () {
                    fetch('/search/history')
                        .then(response => response.json())
                        .then(data => {
                            // Clear the list before adding new items
                            searchHistoryList.innerHTML = '';

                            if (data.length > 0) {
                                searchHistoryContainer.classList.remove('hidden');

                                data.forEach(function (query) {
                                    var li = document.createElement('li');
                                    li.textContent = query;
                                    li.classList.add('cursor-pointer');
                                    li.addEventListener('click', function (event) {
                                        event.preventDefault();  // Prevent form from auto-submitting due to blur
                                        searchInput.value = query;
                                        searchHistoryContainer.classList.add('hidden');
                                        searchForm.submit();  // Submit the form with the selected query
                                    });
                                    searchHistoryList.appendChild(li);
                                });
                            }
                        });
                });

                searchInput.addEventListener('blur', function () {
                    // Hide the search history after a short delay to allow click event to register
                    setTimeout(function () {
                        searchHistoryContainer.classList.add('hidden');
                    }, 200);
                });
            });
        </script>

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
{{--<script>--}}
{{--    // JavaScript для отображения истории запросов--}}
{{--    document.addEventListener('DOMContentLoaded', function () {--}}
{{--        var searchInput = document.querySelector('input[name="search"]');--}}
{{--        var searchHistoryContainer = document.getElementById('search-history');--}}

{{--        searchInput.addEventListener('input', function () {--}}
{{--            // Отправка AJAX-запроса для получения истории запросов--}}
{{--            fetch('/search/history')--}}
{{--                .then(response => response.json())--}}
{{--                .then(data => {--}}
{{--                    // Отображение истории запросов--}}
{{--                    searchHistoryContainer.innerHTML = '';--}}
{{--                    data.forEach(function (query) {--}}
{{--                        var li = document.createElement('li');--}}
{{--                        li.textContent = query;--}}
{{--                        searchHistoryContainer.appendChild(li);--}}
{{--                    });--}}
{{--                });--}}
{{--        });--}}

{{--        searchInput.addEventListener('blur', function () {--}}
{{--            // Скрытие истории запросов при потере фокуса--}}
{{--            searchHistoryContainer.innerHTML = '';--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
