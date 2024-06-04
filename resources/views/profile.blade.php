@extends('includes.template')
@section('content')
    <div class="container 2xl:px-0 sx:px-3">
        <div class="flex 2lx:mt-10 sx:mt-24 items-center mb-7">
            <img src="{{ asset('assets/images/user.svg') }}" alt="" class="mr-2">
            @if(isset(auth()->user()->username))
                <p class="mr-3 text-3xl cursor-pointer" onclick="openModal()">{{ auth()->user()->username }}</p>
            @else
                <p id="name-text" class="mr-3 text-3xl cursor-pointer" onclick="openModal()">Не указано</p>
            @endif
            <form action="{{ route('user.logout') }}" method="post">
                @csrf
                <button type="submit" class="flex text-white gap-0.5 bg-[#298DFF] rounded-lg items-center px-3 py-1">
                    <img src="{{ asset('assets/images/logout.svg') }}" alt="">выйти
                </button>
            </form>
        </div>
        @if(auth()->user()->confirmation == 'Подтвержден')
            <a class="flex items-center gap-2 mb-4">
                <img src="{{ asset('img/green-button.png') }}" alt="" class="h-5">
                Аккаунт подтвержден
            </a>
        @else
            <a href="{{ route('user.login') }}" class="flex items-center gap-2 mb-4">
                <img src="{{ asset('img/red-button.png') }}" alt="" class="h-5">
                Аккаунт не подтвержден
            </a>
        @endif
        <div class="text-2xl text-opacity-80 text-black mb-7">Доступно обновлений ({{ count($updatedApplications)  }})
        </div>
        @if(count($newApplications) > 0 or count($updatedApplications) > 0)
            @if(count($updatedApplications)>0)
                <div class="border-t border-[#828282] border-opacity-40 pt-7 pb-2">
                    @foreach($updatedApplications as $application)
                        <div class="grid 2xl:grid-cols-4 xl:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 sm:gap-x-3 sx:grid-cols-1 items-center pb-4">
                            <div class="flex items-center gap-3.5">
                                <img src="{{ asset('storage/application-logo/' . $application->logo_image) }}" alt=""
                                     class="max-w-[76px]">
                                <div class="flex flex-col gap-x-1">
                                    <div class="font-medium text-xl">{{ $application->title }}</div>
                                    <div class="text-base text-[#298DFF]">{{ $application->developer->username }}</div>
                                </div>
                            </div>
                            <div class="text-xl sm:my-0 sx:my-3">
                                {{ $application->type->title }}
                            </div>
                            <div
                                class="text-xl md:mt-0 sm:mt-3 rounded-xl p-2.5 border border-[#C5C5C5] border-opacity-60 sm:mb-0 sx:mb-3 sm:max-w-[232px] sx:w-full w-full flex justify-center">
                                Доступно обновление
                            </div>
                            <div class="flex xl:justify-end sm:justify-start xl:mt-0 sm:mb-0 sx:mb-3 lg:mt-0 md:mt-3 sm:mt-3">
                                <a href="{{ route('application.download', $application->id) }}"
                                   class="bg-[#298DFF] rounded-xl py-2.5 px-10 text-xl text-white sm:w-full sx:w-full text-center">Скачать
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="border-t border-[#828282] border-opacity-40 pt-7">
                @foreach($newApplications as $app)
                    <div class="grid 2xl:grid-cols-4 xl:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 sm:gap-x-3 sx:grid-cols-1 items-center pb-4">
                        <div class="flex items-center gap-3.5">
                            <a href="{{ route('application.view', $app->id) }}"><img
                                    src="{{ asset('storage/application-logo/' . $app->logo_image) }}" alt=""
                                    class="max-w-[76px]"></a>
                            <div class="flex flex-col gap-x-1">
                                <div class="font-medium text-xl ">{{ $app->title }}</div>
                                <div class="text-base text-[#298DFF]">{{ $app->developer->username }}</div>
                            </div>
                        </div>
                        <div class="text-xl sm:my-0 sx:my-3">
                            {{ $app->type->title }}
                        </div>
                        <div
                            class="text-xl md:mt-0 sm:mt-3 rounded-xl p-2.5 border border-[#C5C5C5] border-opacity-60 sm:mb-0 sx:mb-3 sm:max-w-[232px] sx:w-full w-full flex justify-center">
                            Версия: {{ $app->latestVersion->version }}
                        </div>
                        <div class="flex xl:justify-end sm:justify-start xl:mt-0 sm:mb-0 sx:mb-3 lg:mt-0 md:mt-3 sm:mt-3">
                            <a href="{{ route('application.download', $app->id) }}"
                               class="bg-[#828282] rounded-xl py-2.5 px-10 text-xl text-white sm:w-full sx:w-full text-center">Скачать
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex justify-center items-center mt-24 flex-col gap-y-4">
                <h1 class="text-center text-2xl">На данный момент никаких приложений и игр не скачивалось</h1>
                <a href="{{ route('catalog.index') }}"
                   class="flex text-xl text-white gap-0.5 bg-[#298DFF] rounded-lg items-center px-4 py-2">Перейти в
                    каталог</a>
            </div>
        @endif
    </div>
    <div id="editNameModal" class="modal fixed inset-0 hidden z-[100]">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-black opacity-50 pointer-events-none"></div>
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md z-[101]" id="modalWindow">
                <form action="{{ route('user.name.update') }}" method="post">
                    @csrf
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Изменить имя</h3>
                    <input type="text" name="username" id="editNameInput"
                           value="@if(isset(auth()->user()->username)){{ auth()->user()->username }}@endif"
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
            let modal = document.getElementById('editNameModal');
            modal.classList.remove('hidden');
        }

        function closeModal() {
            let modal = document.getElementById('editNameModal');
            modal.classList.add('hidden');
        }


    </script>
@endsection
