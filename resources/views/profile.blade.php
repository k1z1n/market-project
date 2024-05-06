@extends('includes.template')
@section('content')
    <div class="container">
        <div class="flex mt-10 items-center mb-7">
            <img src="{{ asset('assets/images/user.svg') }}" alt="" class="mr-2">
            <p class="mr-3 text-3xl">{{ auth()->user()->email }}</p>
            <form action="{{ route('user.logout') }}" method="post">
                @csrf
                <button type="submit" class="flex text-white gap-0.5 bg-[#298DFF] rounded-lg items-center px-3 py-1">
                    <img src="{{ asset('assets/images/logout.svg') }}" alt="">выйти
                </button>
            </form>
        </div>
        <div class="text-2xl text-opacity-80 text-black mb-7">Доступно обновлений (0)</div>
        @if(1<0)
            <div class="border-t border-[#828282] border-opacity-40 pt-7 pb-2">
                <div class="flex justify-between items-center pb-4">
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="flex flex-col gap-x-1">
                            <div class="font-medium text-xl">Boob beach</div>
                            <div class="text-base">Super Cell</div>
                        </div>
                    </div>
                    <div class="text-xl">
                        Приложение
                    </div>
                    <div
                        class="text-xl rounded-xl p-2.5 border border-[#C5C5C5] border-opacity-60 max-w-[232px] w-full flex justify-center">
                        Доступно обновление
                    </div>
                    <div>
                        <button type="submit" class="bg-[#298DFF] rounded-xl py-2.5 px-10 text-xl text-white">Скачать
                        </button>
                    </div>
                </div>
                <div class="flex justify-between items-center pb-4">
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="flex flex-col gap-x-1">
                            <div class="font-medium text-xl">Boob beach</div>
                            <div class="text-base">Super Cell</div>
                        </div>
                    </div>
                    <div class="text-xl">
                        Приложение
                    </div>
                    <div
                        class="text-xl rounded-xl p-2.5 border border-[#C5C5C5] border-opacity-60 max-w-[232px] w-full flex justify-center">
                        Доступно обновление
                    </div>
                    <div>
                        <button type="submit" class="bg-[#298DFF] rounded-xl py-2.5 px-10 text-xl text-white">Скачать
                        </button>
                    </div>
                </div>
                <div class="flex justify-between items-center pb-4">
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="flex flex-col gap-x-1">
                            <div class="font-medium text-xl">Boob beach</div>
                            <div class="text-base">Super Cell</div>
                        </div>
                    </div>
                    <div class="text-xl">
                        Приложение
                    </div>
                    <div
                        class="text-xl rounded-xl p-2.5 border border-[#C5C5C5] border-opacity-60 max-w-[232px] w-full flex justify-center">
                        Доступно обновление
                    </div>
                    <div>
                        <button type="submit" class="bg-[#298DFF] rounded-xl py-2.5 px-10 text-xl text-white">Скачать
                        </button>
                    </div>
                </div>
                <div class="flex justify-between items-center pb-5">
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="flex flex-col gap-x-1">
                            <div class="font-medium text-xl">Boob beach</div>
                            <div class="text-base">Super Cell</div>
                        </div>
                    </div>
                    <div class="text-xl">
                        Приложение
                    </div>
                    <div
                        class="text-xl rounded-xl p-2.5 border border-[#C5C5C5] border-opacity-60 max-w-[232px] w-full flex justify-center">
                        Доступно обновление
                    </div>
                    <div>
                        <button type="submit" class="bg-[#298DFF] rounded-xl py-2.5 px-10 text-xl text-white">Скачать
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-t border-[#828282] border-opacity-40 pt-7">
                <div class="flex justify-between items-center pb-4">
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="flex flex-col gap-x-1">
                            <div class="font-medium text-xl">Boob beach</div>
                            <div class="text-base">Super Cell</div>
                        </div>
                    </div>
                    <div class="text-xl">
                        Приложение
                    </div>
                    <div
                        class="text-xl rounded-xl p-2.5 border border-[#C5C5C5] border-opacity-60 max-w-[232px] w-full flex justify-center">
                        Версия: 1.0
                    </div>
                    <div>
                        <button type="submit" class="bg-[#828282] rounded-xl py-2.5 px-10 text-xl text-white">Скачать
                        </button>
                    </div>
                </div>
                <div class="flex justify-between items-center pb-4">
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="flex flex-col gap-x-1">
                            <div class="font-medium text-xl">Boob beach</div>
                            <div class="text-base">Super Cell</div>
                        </div>
                    </div>
                    <div class="text-xl">
                        Приложение
                    </div>
                    <div
                        class="text-xl rounded-xl p-2.5 border border-[#C5C5C5] border-opacity-60 max-w-[232px] w-full flex justify-center">
                        Версия: 1.0
                    </div>
                    <div>
                        <button type="submit" class="bg-[#828282] rounded-xl py-2.5 px-10 text-xl text-white">Скачать
                        </button>
                    </div>
                </div>
                <div class="flex justify-between items-center pb-4">
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="flex flex-col gap-x-1">
                            <div class="font-medium text-xl">Boob beach</div>
                            <div class="text-base">Super Cell</div>
                        </div>
                    </div>
                    <div class="text-xl">
                        Приложение
                    </div>
                    <div
                        class="text-xl rounded-xl p-2.5 border border-[#C5C5C5] border-opacity-60 max-w-[232px] w-full flex justify-center">
                        Версия: 1.0
                    </div>
                    <div>
                        <button type="submit" class="bg-[#828282] rounded-xl py-2.5 px-10 text-xl text-white">Скачать
                        </button>
                    </div>
                </div>
                <div class="flex justify-between items-center pb-4">
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="flex flex-col gap-x-1">
                            <div class="font-medium text-xl">Boob beach</div>
                            <div class="text-base">Super Cell</div>
                        </div>
                    </div>
                    <div class="text-xl">
                        Приложение
                    </div>
                    <div
                        class="text-xl rounded-xl p-2.5 border border-[#C5C5C5] border-opacity-60 max-w-[232px] w-full flex justify-center">
                        Версия: 1.0
                    </div>
                    <div>
                        <button type="submit" class="bg-[#828282] rounded-xl py-2.5 px-10 text-xl text-white">Скачать
                        </button>
                    </div>
                </div>
            </div>
        @else
            <div class="flex justify-center items-center mt-24 flex-col gap-y-4">
                <h1 class="text-center text-2xl">На данный момент никаких приложений и игр не скачивалось</h1>
                <a href="{{ route('catalog') }}" class="flex text-xl text-white gap-0.5 bg-[#298DFF] rounded-lg items-center px-4 py-2">Перейти в каталог</a>
            </div>
        @endif
    </div>
@endsection
