@extends('includes.template')
@section('title', 'TatApps')
@section('content')
    <div class="container">
        <div class="flex flex-col 2xl:mt-20 sx:mt-6 grid-g">
            <div>
                <div class="flex gap-2 font-[400] text-3xl">
                    Подборки
                </div>
            </div>
            <div
                class="grid 2xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-2 sx:grid-cols-1 sx:gap-2 2xl:gap-5 2xl:mt-10 2xl:mb-20 sx:mt-6 sx:mb-6">
                @if(count($filteredCategories) > 0)
                    @foreach ($filteredCategories as $index => $category)
                        <a href="{{ route('compilation.category', $category->id) }}"
                           class="w-full relative rounded-2xl h-[180px]">
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
                @else
                    <h1 class="text-center">Подборки не найдены</h1>
                @endif
            </div>
        </div>
    </div>
@endsection
