@extends('includes.template')
@section('title', 'main')
@section('content')
    <div class="glide 2xl:mt-10 sx:mt-24 overflow-hidden">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <li class="glide__slide">
                    <a href="{{ route('application') }}">
                        <img src="{{asset('img.png')}}" alt="Image 1">
                    </a>
                </li>
                <li class="glide__slide">
                    <a href="{{ route('application') }}">
                        <img src="{{asset('img.png')}}" alt="Image 1">
                    </a>
                </li>
                <li class="glide__slide">
                    <a href="{{ route('application') }}">
                        <img src="{{asset('img.png')}}" alt="Image 1">
                    </a>
                </li>
            </ul>
        </div>
        <div class="glide__bullets" data-glide-el="controls[nav]"></div>
    </div>
    <script src="{{ asset('assets/js/slider.js') }}" defer></script>
    <div class="container sx:px-2">
        <div class="flex flex-col 2xl:mt-20 sx:mt-6 grid-g">
            <div>
                <a href="{{ route('catalog') }}" class="flex gap-2 font-[400] text-2xl">Приложения<img
                        src="{{ asset('assets/images/arrow-right.svg') }}" alt=""></a>
            </div>
            <div
                class="grid 2xl:grid-cols-4 xl:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 sx:grid-cols-1 gap-x-4 gap-y-4 2xl:mt-10 sx:mt-6">
                {{--            @foreach($applications as $app)--}}
                <div class="bg-white py-4 px-7 rounded-3xl">
                    <a href="" class="flex gap-3">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="w-full">
                            <div class="">Boob beach</div>
                            <div class="flex mx-1 mt-2 mb-7 items-center">
                                <span
                                    class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                        src="{{ asset('assets/images/star.svg') }}" alt=""></span><span class="ml-1">Games</span>
                            </div>
                            <div class="flex justify-end text-[200]">
                                <button class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl">скачать</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="bg-white py-4 px-7 rounded-3xl">
                    <a href="" class="flex gap-3">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="w-full">
                            <div class="">Boob beach</div>
                            <div class="flex mx-1 mt-2 mb-7 items-center">
                                <span
                                    class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                        src="{{ asset('assets/images/star.svg') }}" alt=""></span><span class="ml-1">Games</span>
                            </div>
                            <div class="flex justify-end text-[200]">
                                <button class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl">скачать</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="bg-white py-4 px-7 rounded-3xl">
                    <a href="" class="flex gap-3">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="w-full">
                            <div class="">Boob beach</div>
                            <div class="flex mx-1 mt-2 mb-7 items-center">
                                <span
                                    class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                        src="{{ asset('assets/images/star.svg') }}" alt=""></span><span class="ml-1">Games</span>
                            </div>
                            <div class="flex justify-end text-[200]">
                                <button class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl">скачать</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="bg-white py-4 px-7 rounded-3xl">
                    <a href="" class="flex gap-3">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="w-full">
                            <div class="">Boob beach</div>
                            <div class="flex mx-1 mt-2 mb-7 items-center">
                                <span
                                    class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                        src="{{ asset('assets/images/star.svg') }}" alt=""></span><span class="ml-1">Games</span>
                            </div>
                            <div class="flex justify-end text-[200]">
                                <button class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl">скачать</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="bg-white py-4 px-7 rounded-3xl">
                    <a href="" class="flex gap-3">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="w-full">
                            <div class="">Boob beach</div>
                            <div class="flex mx-1 mt-2 mb-7 items-center">
                                <span
                                    class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                        src="{{ asset('assets/images/star.svg') }}" alt=""></span><span class="ml-1">Games</span>
                            </div>
                            <div class="flex justify-end text-[200]">
                                <button class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl">скачать</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="bg-white py-4 px-7 rounded-3xl">
                    <a href="" class="flex gap-3">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="w-full">
                            <div class="">Boob beach</div>
                            <div class="flex mx-1 mt-2 mb-7 items-center">
                                <span
                                    class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                        src="{{ asset('assets/images/star.svg') }}" alt=""></span><span class="ml-1">Games</span>
                            </div>
                            <div class="flex justify-end text-[200]">
                                <button class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl">скачать</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="bg-white py-4 px-7 rounded-3xl">
                    <a href="" class="flex gap-3">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="w-full">
                            <div class="">Boob beach</div>
                            <div class="flex mx-1 mt-2 mb-7 items-center">
                                <span
                                    class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                        src="{{ asset('assets/images/star.svg') }}" alt=""></span><span class="ml-1">Games</span>
                            </div>
                            <div class="flex justify-end text-[200]">
                                <button class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl">скачать</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="bg-white py-4 px-7 rounded-3xl">
                    <a href="" class="flex gap-3">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="w-full">
                            <div class="">Boob beach</div>
                            <div class="flex mx-1 mt-2 mb-7 items-center">
                                <span
                                    class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                        src="{{ asset('assets/images/star.svg') }}" alt=""></span><span class="ml-1">Games</span>
                            </div>
                            <div class="flex justify-end text-[200]">
                                <button class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl">скачать</button>
                            </div>
                        </div>
                    </a>
                </div>
                {{--            @endforeach--}}
            </div>
        </div>
        <div class="flex flex-col 2xl:mt-20 sx:mt-6 grid-g">
            <div>
                <a href="{{ route('catalog') }}" class="flex gap-2 font-[400] text-2xl">Игры<img
                        src="{{ asset('assets/images/arrow-right.svg') }}" alt=""></a>
            </div>
            <div
                class="grid 2xl:grid-cols-4 xl:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 sx:grid-cols-1 gap-x-4 gap-y-4 2xl:mt-10 sx:mt-6">
                {{--            @foreach($applications as $app)--}}
                <div class="bg-white py-4 px-7 rounded-3xl">
                    <a href="" class="flex gap-3">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="w-full">
                            <div class="">Boob beach</div>
                            <div class="flex mx-1 mt-2 mb-7 items-center">
                            <span class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                    src="{{ asset('assets/images/star.svg') }}" alt=""></span><span
                                    class="ml-1">Games</span>
                            </div>
                            <div class="flex justify-end text-[200]">
                                <button class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl">скачать</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="bg-white py-4 px-7 rounded-3xl">
                    <a href="" class="flex gap-3">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="w-full">
                            <div class="">Boob beach</div>
                            <div class="flex mx-1 mt-2 mb-7 items-center">
                            <span class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                    src="{{ asset('assets/images/star.svg') }}" alt=""></span><span
                                    class="ml-1">Games</span>
                            </div>
                            <div class="flex justify-end text-[200]">
                                <button class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl">скачать</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="bg-white py-4 px-7 rounded-3xl">
                    <a href="" class="flex gap-3">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="w-full">
                            <div class="">Boob beach</div>
                            <div class="flex mx-1 mt-2 mb-7 items-center">
                            <span class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                    src="{{ asset('assets/images/star.svg') }}" alt=""></span><span
                                    class="ml-1">Games</span>
                            </div>
                            <div class="flex justify-end text-[200]">
                                <button class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl">скачать</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="bg-white py-4 px-7 rounded-3xl">
                    <a href="" class="flex gap-3">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="w-full">
                            <div class="">Boob beach</div>
                            <div class="flex mx-1 mt-2 mb-7 items-center">
                            <span class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                    src="{{ asset('assets/images/star.svg') }}" alt=""></span><span
                                    class="ml-1">Games</span>
                            </div>
                            <div class="flex justify-end text-[200]">
                                <button class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl">скачать</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="bg-white py-4 px-7 rounded-3xl">
                    <a href="" class="flex gap-3">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="w-full">
                            <div class="">Boob beach</div>
                            <div class="flex mx-1 mt-2 mb-7 items-center">
                            <span class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                    src="{{ asset('assets/images/star.svg') }}" alt=""></span><span
                                    class="ml-1">Games</span>
                            </div>
                            <div class="flex justify-end text-[200]">
                                <button class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl">скачать</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="bg-white py-4 px-7 rounded-3xl">
                    <a href="" class="flex gap-3">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="w-full">
                            <div class="">Boob beach</div>
                            <div class="flex mx-1 mt-2 mb-7 items-center">
                            <span class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                    src="{{ asset('assets/images/star.svg') }}" alt=""></span><span
                                    class="ml-1">Games</span>
                            </div>
                            <div class="flex justify-end text-[200]">
                                <button class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl">скачать</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="bg-white py-4 px-7 rounded-3xl">
                    <a href="" class="flex gap-3">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="w-full">
                            <div class="">Boob beach</div>
                            <div class="flex mx-1 mt-2 mb-7 items-center">
                            <span class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                    src="{{ asset('assets/images/star.svg') }}" alt=""></span><span
                                    class="ml-1">Games</span>
                            </div>
                            <div class="flex justify-end text-[200]">
                                <button class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl">скачать</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="bg-white py-4 px-7 rounded-3xl">
                    <a href="" class="flex gap-3">
                        <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                        <div class="w-full">
                            <div class="">Boob beach</div>
                            <div class="flex mx-1 mt-2 mb-7 items-center">
                            <span class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                    src="{{ asset('assets/images/star.svg') }}" alt=""></span><span
                                    class="ml-1">Games</span>
                            </div>
                            <div class="flex justify-end text-[200]">
                                <button class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl">скачать</button>
                            </div>
                        </div>
                    </a>
                </div>
                {{--            @endforeach--}}
            </div>
        </div>
        <div class="flex flex-col 2xl:mt-20 sx:mt-6 grid-g">
            <div>
                <a href="{{ route('compilation') }}" class="flex gap-2 font-[400] text-2xl">
                    Подборки
                    <img src="{{ asset('assets/images/arrow-right.svg') }}" alt="">
                </a>
            </div>
            <div class="grid 2xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-2 sx:grid-cols-1 sx:gap-2 2xl:gap-5 2xl:mt-10 2xl:mb-20 sx:mt-6 sx:mb-6">
                <a href="" class="w-full relative rounded-2xl h-[180px]">
                    <img class="absolute top-0 left-0 w-full h-full object-cover filter brightness-50 rounded-2xl"
                         src="{{ asset('assets/images/fon.svg') }}" alt="">
                    <div class="z-10 absolute top-0 left-0 w-full h-full flex items-center pl-10 text-white text-2xl">
                        Гонки
                    </div>
                </a>
                <a href="" class="w-full relative rounded-2xl h-[180px]">
                    <img class="absolute top-0 left-0 w-full h-full object-cover filter brightness-50 rounded-2xl"
                         src="{{ asset('assets/images/fon.svg') }}" alt="">
                    <div class="z-10 absolute top-0 left-0 w-full h-full flex items-center pl-10 text-white text-2xl">
                        Гонки
                    </div>
                </a>
                <a href="" class="w-full relative rounded-2xl h-[180px]">
                    <img class="absolute top-0 left-0 w-full h-full object-cover filter brightness-50 rounded-2xl"
                         src="{{ asset('assets/images/fon.svg') }}" alt="">
                    <div class="z-10 absolute top-0 left-0 w-full h-full flex items-center pl-10 text-white text-2xl">
                        Гонки
                    </div>
                </a>
                <a href="" class="w-full relative rounded-2xl h-[180px]">
                    <img class="absolute top-0 left-0 w-full h-full object-cover filter brightness-50 rounded-2xl"
                         src="{{ asset('assets/images/fon.svg') }}" alt="">
                    <div class="z-10 absolute top-0 left-0 w-full h-full flex items-center pl-10 text-white text-2xl">
                        Гонки
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
