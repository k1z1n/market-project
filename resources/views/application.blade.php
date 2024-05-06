@extends('includes.template')
@section('title', 'main')
@section('content')
    <div class="container sx:px-2">
        <div class="w-full rounded-2xl shadow-custom mt-20 lg:px-9 sx:px-4 lg:py-5 sx:py-2">
            <div class="flex gap-x-12">
                <div class=""><img src="{{ asset('assets/images/product-logo.svg') }}" alt=""
                                   class="max-h-[88px] h-full">
                </div>
                <div class="">
                    <div class="font-[700] text-[1.375rem] pb-2">Boom Beach</div>
                    <div class="text-[#298DFF] text-lg pb-3">super sell</div>
                    <div class="lg:flex gap-x-2.5 mb-3.5 sx:hidden">
                        <div class="flex flex-col items-center justify-between border-r border-opacity-60 border-[#828282] pr-2.5">
                            <div class="flex"><p>4.1</p><img src="{{ asset('assets/images/star.svg') }}" alt=""></div>
                            <div class="text-sm text-[#828282]">10 тыс отзывов</div>
                        </div>
                        <div class="flex flex-col items-center justify-between border-r border-opacity-60 border-[#828282] pr-2.5">
                            <div class=""><img src="{{ asset('assets/images/download-gray.svg') }}" alt=""></div>
                            <div class="text-sm">15 мб</div>
                        </div>
                        <div class="flex flex-col items-center justify-between border-r border-opacity-60 border-[#828282] pr-2.5">
                            <div class="">150 000</div>
                            <div class="text-sm text-[#828282]">скачиваний</div>
                        </div>
                        <div class="flex flex-col items-center justify-between border-r border-opacity-60 border-[#828282] pr-2.5">
                            <div class="">16+</div>
                            <div class="text-sm text-[#828282]">возраст</div>
                        </div>
                        <div class="flex flex-col items-center justify-between">
                            <div class=""><img src="{{ asset('assets/images/data-gray.svg') }}" alt=""></div>
                            <div class="text-sm">24 марта 2024</div>
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" class="bg-[#298DFF] py-1.5 px-12 rounded-2xl text-white">Скачать</button>
                    </div>
                </div>
            </div>
            <div class="flex gap-x-2.5 mb-2.5 overflow-x-auto lg:hidden mt-10 w-full">
                <div class="flex flex-col items-center justify-between border-r border-opacity-60 border-[#828282] pr-2.5">
                    <div class="flex"><p>4.1</p><img src="{{ asset('assets/images/star.svg') }}" alt=""></div>
                    <div class="text-sm text-[#828282] text-nowrap">10 тыс отзывов</div>
                </div>
                <div class="flex flex-col items-center justify-between border-r border-opacity-60 border-[#828282] pr-2.5">
                    <div class=""><img src="{{ asset('assets/images/download-gray.svg') }}" alt=""></div>
                    <div class="text-sm text-nowrap">15 мб</div>
                </div>
                <div class="flex flex-col items-center justify-between border-r border-opacity-60 border-[#828282] pr-2.5">
                    <div class="">150 000</div>
                    <div class="text-sm text-[#828282] text-nowrap">скачиваний</div>
                </div>
                <div class="flex flex-col items-center justify-between border-r border-opacity-60 border-[#828282] pr-2.5">
                    <div class="">16+</div>
                    <div class="text-sm text-[#828282] text-nowrap">возраст</div>
                </div>
                <div class="flex flex-col items-center justify-between">
                    <div class=""><img src="{{ asset('assets/images/data-gray.svg') }}" alt=""></div>
                    <div class="text-sm text-nowrap">24 марта 2024</div>
                </div>
            </div>
        </div>
        <div class="w-full overflow-hidden">
            <div class="flex mt-10 overflow-x-auto gap-4">
                <img src="{{asset('assets/images/application-image.svg')}}" alt="Image 1">
                <img src="{{asset('assets/images/application-image.svg')}}" alt="Image 1">
                <img src="{{asset('assets/images/application-image.svg')}}" alt="Image 1">
            </div>
        </div>
        {{--        <script src="{{ asset('assets/js/slider-application.js') }}" defer></script>--}}
        <div class="w-full shadow-custom rounded-2xl mt-11 mb-10 bg-white">
            <div class="w-full text-base font-semibold pl-9 py-3 border-b border-[#c5c5c5] border-opacity-60">
                Описание
            </div>
            <div class="w-full text-base pl-9 py-3 ">
                ewqjewqeiojwq ejwqoiej iqwjeo wioeioqwj eiowjqio ejqwio ejioqweio jqwoe ioqw oiejqwioe jqwioej ioqwje
                oiqeoi qwjioe jqwoie ioqwje oqwjeoi qioe qio jeioqwje iojqeoi jqwoiejqwe oiqwjeoi qwjei jqwioj qwej
                qwjoe jqwoie jqwoiej ioqwjeo iqwjeoiqwjeoi jq <span class="text-[#298DFF]">подробнее...</span>
            </div>
        </div>
        <div class="">
            <div class="text-[1.625rem] font-normal pb-4">Оценки и отзывы</div>
            <div class="flex lg:flex-row-reverse sx:flex-col lg:items-start sx:items-center sx gap-4">
                <div class="flex flex-col items-center lg:pl-14">
                    <div class="text-4xl mb-1">4,1</div>
                    <div class="flex gap-1 mb-4">
                        <img src="{{ asset('assets/images/star.svg') }}" alt="" class="w-[1.375rem]">
                        <img src="{{ asset('assets/images/star.svg') }}" alt="" class="w-[1.375rem]">
                        <img src="{{ asset('assets/images/star.svg') }}" alt="" class="w-[1.375rem]">
                        <img src="{{ asset('assets/images/star.svg') }}" alt="" class="w-[1.375rem]">
                    </div>
                    <div class="text-[#828282] text-nowrap">10 тыс отзывов</div>
                </div>
                <div class="w-full flex flex-col gap-y-9">
                    <div class="w-full rounded-2xl bg-white py-5 px-12">
                        <div class="sx:flex-col lg:flex-row gap-x-4 md:flex items-start">
                            <div class="text-lg">Андрей</div>
                            <div class="flex lg:flex-row sx:flex-row-reverse gap-x-4 sx:justify-end">
                                <div class="text-[#828282] text-base">18 марта 2024</div>
                                <div class="flex gap-x-1">
                                    <img src="{{ asset('assets/images/star.svg') }}" alt="" class="w-[1.125rem]">
                                    <img src="{{ asset('assets/images/star.svg') }}" alt="" class="w-[1.125rem]">
                                    <img src="{{ asset('assets/images/star.svg') }}" alt="" class="w-[1.125rem]">
                                    <img src="{{ asset('assets/images/star.svg') }}" alt="" class="w-[1.125rem]">
                                    <img src="{{ asset('assets/images/star.svg') }}" alt="" class="w-[1.125rem]">
                                </div>
                            </div>
                        </div>
                        <div class="max-w-[834px] text-gray-500 text-xl mt-4">Отличное приложение! Все понятно и удобно,
                            еще
                            присутствуют видео уроки с
                            <span class="text-[#298DFF]">подробнее...</span>
                        </div>
                    </div>
                    <div class="w-full rounded-2xl py-5 px-12 bg-white">
                        <div class="sx:flex-col lg:flex-row gap-x-4 md:flex items-start">
                            <div class="text-lg">Андрей</div>
                            <div class="flex lg:flex-row sx:flex-row-reverse gap-x-4 sx:justify-end">
                                <div class="text-[#828282] text-base">18 марта 2024</div>
                                <div class="flex gap-x-1">
                                    <img src="{{ asset('assets/images/star.svg') }}" alt="" class="w-[1.125rem]">
                                    <img src="{{ asset('assets/images/star.svg') }}" alt="" class="w-[1.125rem]">
                                    <img src="{{ asset('assets/images/star.svg') }}" alt="" class="w-[1.125rem]">
                                    <img src="{{ asset('assets/images/star.svg') }}" alt="" class="w-[1.125rem]">
                                    <img src="{{ asset('assets/images/star.svg') }}" alt="" class="w-[1.125rem]">
                                </div>
                            </div>
                        </div>
                        <div class="max-w-[834px] text-gray-500 text-xl mt-4">Отличное приложение! Все понятно и удобно,
                            еще
                            присутствуют видео уроки с
                            <span class="text-[#298DFF]">подробнее...</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-[#298DFF] text-xl ml-12 mt-5">
                Читать все
            </div>
        </div>
        <div class="mb-10">
            <div class="text-[1.625rem] font-normal mb-9 mt-14">Похожее</div>
            <div class="flex gap-x-[1.875rem] overflow-x-auto">
                <a href="" class="">
                    <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                        <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                        <div class="average-color-overlay"></div>
                    </div>
                    <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                        <div class="font-semibold text-base pt-2">Instagram</div>
                        <div class="flex justify-between pt-5 items-center">
                            <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                                4.1
                                <img src="{{ asset('assets/images/star.svg') }}" alt="">
                            </div>
                            <div>
                                <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                    скачать
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="" class="">
                    <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                        <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                        <div class="average-color-overlay"></div>
                    </div>
                    <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                        <div class="font-semibold text-base pt-2">Instagram</div>
                        <div class="flex justify-between pt-5 items-center">
                            <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                                4.1
                                <img src="{{ asset('assets/images/star.svg') }}" alt="">
                            </div>
                            <div>
                                <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                    скачать
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="" class="">
                    <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                        <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                        <div class="average-color-overlay"></div>
                    </div>
                    <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                        <div class="font-semibold text-base pt-2">Instagram</div>
                        <div class="flex justify-between pt-5 items-center">
                            <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                                4.1
                                <img src="{{ asset('assets/images/star.svg') }}" alt="">
                            </div>
                            <div>
                                <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                    скачать
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="" class="">
                    <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                        <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                        <div class="average-color-overlay"></div>
                    </div>
                    <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                        <div class="font-semibold text-base pt-2">Instagram</div>
                        <div class="flex justify-between pt-5 items-center">
                            <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                                4.1
                                <img src="{{ asset('assets/images/star.svg') }}" alt="">
                            </div>
                            <div>
                                <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                    скачать
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="" class="">
                    <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                        <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                        <div class="average-color-overlay"></div>
                    </div>
                    <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                        <div class="font-semibold text-base pt-2">Instagram</div>
                        <div class="flex justify-between pt-5 items-center">
                            <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                                4.1
                                <img src="{{ asset('assets/images/star.svg') }}" alt="">
                            </div>
                            <div>
                                <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                    скачать
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="" class="">
                    <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                        <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                        <div class="average-color-overlay"></div>
                    </div>
                    <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                        <div class="font-semibold text-base pt-2">Instagram</div>
                        <div class="flex justify-between pt-5 items-center">
                            <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                                4.1
                                <img src="{{ asset('assets/images/star.svg') }}" alt="">
                            </div>
                            <div>
                                <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                    скачать
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/image.js') }}" defer></script>
@endsection
