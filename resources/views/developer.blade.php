@extends('includes.template')
@section('content')
    <div class="container sx:px-2">
        <div class="text-3xl font-normal mb-3.5 mt-20">{{ $developer->username }}</div>
        <div class="flex justify-between pb-3.5 border-b border-[#828282] border-opacity-50 flex-wrap">
            <div class="lg:text-2xl sx:text-xl text-[#298DFF] font-normal">разработчик</div>
            <div class="flex gap-x-6"><p class="lg:text-2xl sx:text-xl text-[#828282] font-normal">Всего приложений</p>
                <span class="lg:text-2xl sx:text-xl font-normal">{{ $countApplications }}</span></div>
        </div>
        <div class="flex gap-3.5 mt-6 pb-6 border-b border-[#828282] border-opacity-50 w-full overflow-x-auto">
            <div class="flex flex-col items-center justify-between pr-3.5 border-r border-[#828282] border-opacity-50">
                <div class="flex items-center gap-0.5"><p>4.1</p><img src="{{ asset('assets/images/star.svg') }}"
                                                                      alt=""></div>
                <div class="text-base text-[#828282] text-nowrap">10 тыс отзывов</div>
            </div>
            <div class="flex flex-col items-center justify-between pr-3.5 border-r border-[#828282] border-opacity-50">
                <div class=""><img src="{{ asset('assets/images/download.svg') }}" alt=""></div>
                <div class="text-base text-[#828282] text-nowrap">10 тыс скачиваний</div>
            </div>
            <div class="flex flex-col items-center justify-between">
                <div class=""><img src="{{ asset('assets/images/data.svg') }}" alt=""></div>
                <div class="text-base text-[#828282] text-nowrap">24 марта 2024</div>
            </div>
        </div>
        <div class="grid xl:grid-cols-3 lg:grid-cols-2 mt-5 gap-y-7 md:grid-cols-2 sm:grid-cols-2 sx:grid-cols-1 gap-x-2">
            @foreach($applications as $app)
                <a href="{{ route('application.view', $app->id) }}" class="flex gap-3.5 cursor-pointer">
                    <img src="{{ asset('storage/application-logo/' . $app->logo_image) }}" alt="" class="max-w-[76px] object-contain">
                    <div class="flex flex-col gap-0.5 overflow-hidden">
                        <p class="text-xl font-medium">{{$app->title}}</p>
                        <p class="text-xs font-normal overflow-x-auto text-nowrap">Игра от {{$developer->username}}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
