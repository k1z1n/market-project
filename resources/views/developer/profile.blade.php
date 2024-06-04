@extends('includes.template')
@section('content')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js"></script>
    <div class="container sx:px-6 2xl:px-0">
        <div class="flex items-center 2xl:mt-20 sx:mt-28 sm:justify-between sm:flex-row sx:flex-col sx:items-start">
            <div class="flex items-center mb-7">
                <img src="{{ asset('assets/images/user.svg') }}" alt="" class="mr-2">
                @if(isset(auth('developer')->user()->username))
                    <p class="mr-3 text-3xl cursor-pointer" onclick="openModal()">{{ auth('developer')->user()->username }}</p>
                @else
                    <p id="name-text" class="mr-3 text-3xl cursor-pointer" onclick="openModal()">Не указано</p>
                @endif
                <form action="{{ route('developer.logout') }}" method="post">
                    @csrf
                    <button type="submit"
                            class="flex text-white gap-0.5 bg-[#298DFF] rounded-lg items-center px-3 py-1"><img
                            src="{{ asset('assets/images/logout.svg') }}" alt="">выйти
                    </button>
                </form>
            </div>
            <div class="flex flex-col items-center gap-2 justify-end">
                <img src="{{ asset('assets/images/data-gray.svg') }}" alt="">
                <p>{{ $date }}</p>
            </div>
        </div>
        @if(auth('developer')->user()->confirmation == 'Подтвержден')
            <a href="" class="flex items-center gap-2 mb-4">
                <img src="{{ asset('img/green-button.png') }}" alt="" class="h-5">
                Аккаунт подтвержден
            </a>
        @else
            <a href="{{ route('developer.login') }}" class="flex items-center gap-2 mb-4">
                <img src="{{ asset('img/red-button.png') }}" alt="" class="h-5">
                Аккаунт не подтвержден
            </a>
        @endif
        <div class="flex sx:flex-col lg:flex-row lg:justify-between pb-3 border-b border-[#c5c5c5] border-opacity-60 ">
            <div class="flex gap-x-2 items-end">
                <p class="text-[#828282] text-2xl">разработчик</p>
                @if(auth('developer')->user()->status === 'активен')
                    <p class="text-green-600 text-xl">{{ auth('developer')->user()->status }}</p>
                @else
                    <p class="text-red-600 text-xl">{{ auth('developer')->user()->status }}</p>
                @endif
            </div>
            <div class="text-2xl text-opacity-80 text-[#828282] flex lg:flex-row sx:flex-col sx:items-start lg:items-center gap-x-4"><a
                    href="{{ route('developer.add.app') }}" class="text-[#298dff] text-sm underline">Добавить приложение
                    +</a><div>Всего приложений <span class="text-black">{{ $total }}</span></div>
            </div>
        </div>
        @if(isset($applications))
            <div class="grid 2xl:grid-cols-4 xl:grid-cols-3 md:grid-cols-2 sx:grid-cols-1 pb-6 border-b border-[#c5c5c5] border-opacity-60">
                @foreach($applications as $app)
                    <div class="flex gap-4 mt-6">
                        <img src="{{ asset('storage/application-logo/' . $app->logo_image) }}" alt="" class="max-h-[76px]">
                        <div class="flex flex-col gap-1">
                            <p class="text-lg">{{$app->title}}</p>
                            <a href="{{ route('developer.application.edit', $app->id) }}"
                               class="bg-[#298dff] text-white rounded-2xl px-3 py-0.5 text-sm">Подбробнее</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex justify-center w-full mt-6">
                <h3 class="text-center">Пока нет приложений</h3>
            </div>
        @endif
        {{--        <div class="py-6">--}}
        {{--            <a href="{{ route('statistics') }}" class="text-[#298dff] text-2xl">--}}
        {{--                Подробная статистика--}}
        {{--            </a>--}}
        {{--        </div>--}}
        {{--        <div class="my-8">--}}
        {{--            <canvas id="myChart1"></canvas>--}}
        {{--        </div>--}}
        {{--        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>--}}
        {{--        <script>--}}
        {{--            const ctx1 = document.getElementById('myChart1');--}}
        {{--            const labels1 = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье']--}}
        {{--            new Chart(ctx1, {--}}
        {{--                type: 'line',--}}
        {{--                data: {--}}
        {{--                    labels: labels1,--}}
        {{--                    datasets: [{--}}
        {{--                        label: 'статистика скачиваний всех приложений за неделю',--}}
        {{--                        data: [12, 19, 3, 5, 2, 3],--}}
        {{--                        fill: false,--}}
        {{--                        borderWidth: 1,--}}
        {{--                        tension: 0.1--}}
        {{--                    }]--}}
        {{--                },--}}
        {{--                options: {--}}
        {{--                    scales: {--}}
        {{--                        y: {--}}
        {{--                            beginAtZero: true--}}
        {{--                        }--}}
        {{--                    }--}}
        {{--                }--}}
        {{--            });--}}
        {{--        </script>--}}
    </div>
    <!-- Модальное окно -->
    <div id="editNameModal" class="modal fixed inset-0 hidden z-[100]">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-black opacity-50 pointer-events-none"></div>
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md z-[101]" id="modalWindow">
                <form action="{{ route('developer.update.username') }}" method="post">
                    @csrf
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Изменить имя</h3>
                    <input type="text" name="username" id="editNameInput" value="@if(isset(auth('developer')->user()->username)){{ auth('developer')->user()->username }}@endif"
                           placeholder="Введите новое имя"
                           class="w-full border border-gray-300 rounded-md p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <div class="flex gap-x-2">
                        <button type="submit"
                                class="py-2 w-full rounded-md border border-transparent shadow-sm bg-[#298DFF] text-white">
                            Сохранить
                        </button>
                        <button type="button"
                                class="py-2 w-full rounded-md border border-gray-300 shadow-sm bg-gray-300"
                                onclick="closeModal()">
                            Закрыть
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function openModal() {
            var modal = document.getElementById('editNameModal');
            modal.classList.remove('hidden');
        }

        function closeModal() {
            var modal = document.getElementById('editNameModal');
            modal.classList.add('hidden');
        }
    </script>
@endsection
