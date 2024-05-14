@extends('includes.template')
@section('title', 'main')
@section('content')
    <div class="glide 2xl:mt-10 sx:mt-24 overflow-hidden">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                @foreach($banners as $banner)
                    <li class="glide__slide">
                        <a href="{{ route('application.view', $banner->application->id) }}" class="relative">
                            <p class="absolute top-1/3 left-28 text-white text-2xl z-10">{{ $banner->application->title }}</p>
                            <button
                                class="absolute top-1/2 left-28 py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl z-10">
                                Подробнее
                            </button>
                            <img src="{{asset('storage/application-banner/' . $banner->application->banner_image )}}"
                                 alt="Image 1" class="">
                            <div
                                class="absolute inset-0 bg-black opacity-70 rounded-3xl hover:bg-none hover:opacity-0 transition-all duration-200"></div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="glide__bullets" data-glide-el="controls[nav]"></div>
    </div>
    <script src="{{ asset('assets/js/slider.js') }}" defer></script>
    <div class="container sx:px-2">
        <div class="flex flex-col 2xl:mt-20 sx:mt-6 grid-g">
            <div>
                <a href="{{ route('catalog.view.type', 1) }}" class="flex gap-2 font-[400] text-2xl">Приложения<img
                        src="{{ asset('assets/images/arrow-right.svg') }}" alt=""></a>
            </div>
            <div
                class="grid 2xl:grid-cols-4 xl:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 sx:grid-cols-1 gap-x-4 gap-y-4 2xl:mt-10 sx:mt-6">
                @foreach($applications as $app)
                    <div class="bg-white py-4 px-7 rounded-3xl">
                        <a href="{{ route('application.view' , $app->id) }}" class="flex gap-3">
                            <img src="{{ asset('storage/application-logo/' . $app->logo_image) }}" alt=""
                                 class="max-w-[76px] object-contain">
                            <div class="w-full">
                                <div class="">{{ $app->title }}</div>
                                <div class="flex mx-1 mt-2 mb-7 items-center">
                                <span
                                    class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">{{ round($app->feedbacks_avg_stars, 1) }} <img
                                        src="{{ asset('assets/images/star.svg') }}" alt=""></span><span
                                        class="ml-1">{{ $app->type->title }}</span>
                                </div>
                                <div class="flex justify-end text-[200]">
                                    <button
                                        class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl z-[80] download-button"
                                        data-id="{{ $app->id }}">скачать
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="flex flex-col 2xl:mt-20 sx:mt-6 grid-g">
            <div>
                <a href="{{ route('catalog.view.type', 2) }}" class="flex gap-2 font-[400] text-2xl">Игры<img
                        src="{{ asset('assets/images/arrow-right.svg') }}" alt=""></a>
            </div>
            <div
                class="grid 2xl:grid-cols-4 xl:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 sx:grid-cols-1 gap-x-4 gap-y-4 2xl:mt-10 sx:mt-6">
                @foreach($games as $app)
                    <div class="bg-white py-4 px-7 rounded-3xl">
                        <a href="{{ route('application.view' , $app->id) }}" class="flex gap-3">
                            <img src="{{ asset('storage/application-logo/' . $app->logo_image) }}" alt=""
                                 class="max-w-[76px] object-contain">
                            <div class="w-full">
                                <div class="">{{ $app->title }}</div>
                                <div class="flex mx-1 mt-2 mb-7 items-center">
                                <span
                                    class="flex items-center pr-1 border-r-[0.2px] border-[#c5c5c5] border-opacity-60">4.1 <img
                                        src="{{ asset('assets/images/star.svg') }}" alt=""></span><span
                                        class="ml-1">{{ $app->type->title }}</span>
                                </div>
                                <div class="flex justify-end text-[200]">
                                    <button
                                        class="py-0.5 px-4 bg-[#298DFF] text-white rounded-2xl z-[80] download-button"
                                        data-id="{{ $app->id }}">скачать
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <script>
                    document.querySelectorAll('.download-button').forEach(function (button) {
                        button.addEventListener('click', function (event) {
                            event.preventDefault(); // Предотвращаем стандартное действие ссылки
                            var applicationId = this.getAttribute('data-id');
                            var downloadUrl = "{{ route('application.download.js', ':id') }}".replace(':id', applicationId);

                            // Выполняем AJAX-запрос для скачивания файла
                            fetch(downloadUrl)
                                .then(response => response.blob())
                                .then(blob => {
                                    // Создаем объект URL для файла и запускаем скачивание
                                    var url = window.URL.createObjectURL(blob);
                                    var a = document.createElement('a');
                                    a.href = url;
                                    a.download = 'filename.extension'; // Замените на желаемое имя файла
                                    document.body.appendChild(a);
                                    a.click();
                                    document.body.removeChild(a);
                                })
                                .catch(error => {
                                    console.error('Ошибка при скачивании файла:', error);
                                });
                        });
                    });
                </script>
            </div>
        </div>
        <div class="flex flex-col 2xl:mt-20 sx:mt-6 grid-g">
            <div>
                <a href="{{ route('compilation') }}" class="flex gap-2 font-[400] text-2xl">
                    Подборки
                    <img src="{{ asset('assets/images/arrow-right.svg') }}" alt="">
                </a>
            </div>
            <div
                class="grid 2xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-2 sx:grid-cols-1 sx:gap-2 2xl:gap-5 2xl:mt-10 2xl:mb-20 sx:mt-6 sx:mb-6">
                @foreach ($categories as $index => $category)
                    <a href="" class="w-full relative rounded-2xl h-[180px]">
                        @if (isset($featuredApps[$index]) && $featuredApps[$index]->banner_image)
                            <img
                                class="absolute top-0 left-0 w-full h-full object-cover filter brightness-50 rounded-2xl"
                                src="{{ asset('storage/application-banner/' . $featuredApps[$index]->banner_image) }}"
                                alt="{{ $category->title }}">
                        @else
                            <img
                                class="absolute top-0 left-0 w-full h-full object-cover filter brightness-50 rounded-2xl"
                                src="{{ asset('assets/images/fon.svg') }}" alt="">
                        @endif
                        <div
                            class="z-10 absolute top-0 left-0 w-full h-full flex items-center pl-10 text-white text-2xl">
                            {{ $category->title }}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
