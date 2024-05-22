@extends('admin.template')
@section('content')
    <div class="container">
        <div class="lg:flex sx:flex sx:flex-col lg:flex-row sx:gap-3 items-center w-full 2xl:mt-20 sx:mt-24 mb-10">
            <div class="text-3xl text-[#298DFF] w-full">Управление баннером</div>
{{--            <div--}}
{{--                class="w-full lg:flex lg:flex-row sx:flex sx:gap-3 sx:flex-col-reverse sx:items-start gap-x-3.5 lg:items-center">--}}
{{--                <div class="w-full lg:max-w-[25rem] sm:max-w-[15rem] sx:max-w-[10rem]">--}}
{{--                    <form action="{{ route('admin.category.search') }}" method="get"--}}
{{--                          class="relative bg-f9f9f9 border-black border-opacity-5 border-solid border-0.5 w-full">--}}
{{--                        <!-- Здесь может быть форма поиска -->--}}
{{--                        <input type="text" placeholder="Поиск" name="search"--}}
{{--                               class="border-opacity-40 border-[0.5px] border-[#000000] pl-5 text-black lg:py-2 sx:py-1 rounded-2xl outline-none lg:max-w-[25rem] sm:max-w-[15rem] sx:max-w-[10rem] w-full header-input-background">--}}
{{--                        <button type="submit" class="absolute inset-y-0 right-0 pr-2 flex items-center justify-center">--}}
{{--                            <img src="{{ asset('assets/images/search.svg') }}" alt="Поиск" class="">--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </div>--}}
                <div class="flex gap-x-6"><p class="lg:text-2xl sx:text-xl text-[#828282] font-normal text-nowrap">Всего
                        на баннере</p><span class="lg:text-2xl sx:text-xl font-normal">{{ $total }}</span>
                </div>
{{--            </div>--}}
        </div>

        @foreach($applications as $application)
            <div class="overflow-x-auto">
                <table class="table-auto w-full text-center">
                    <thead class="border-b">
                    <tr class="">
                        <th class="px-4 py-2">Название</th>
                        <th class="px-4 py-2">Номер</th>
                        <th class="px-4 py-2">Действие</th>
                    </tr>
                    </thead>
                    <tbody class="">
                    <tr>
                        <td><h5 class="card-title">{{ $application->title }}</h5></td>
                        <form action="{{ route('banner.update') }}" method="POST" class="">
                            @csrf
                            <input type="hidden" name="application_id" value="{{ $application->id }}">
                            <td>
                                <input type="number"
                                       class="text-center outline-none py-2 rounded-xl border border-solid border-[#c5c5c5] border-opacity-60"
                                       placeholder="Порядковый номер" name="sequence"
                                       value="{{ $banners->where('application_id', $application->id)->first()->sequence ?? '' }}">
                            </td>
                            <td>
                                <button type="submit" class="bg-[#298DFF] px-4 py-2 rounded-2xl text-white max-w-44">
                                    Обновить
                                    порядок
                                </button>
                            </td>
                        </form>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card mb-3">
                <div class="flex items-center">




                </div>
            </div>
        @endforeach
    </div>
@endsection
