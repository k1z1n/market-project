@extends('admin.template')
@section('content')
    <div class="container sx:px-2">
        <div class="lg:flex sx:flex sx:flex-col lg:flex-row sx:gap-3 items-center w-full 2xl:mt-20 sx:mt-24 mb-10">
            <div class="text-3xl text-[#298DFF] w-full">Разработчики</div>
            <div
                class="w-full lg:flex lg:flex-row sx:flex sx:gap-3 sx:flex-col-reverse sx:items-start gap-x-3.5 lg:items-center">
                <div class="w-full lg:max-w-[25rem] sm:max-w-[15rem] sx:max-w-[10rem]">
                    <form action="{{ route('admin.developer.search') }}" method="get"
                          class="relative bg-f9f9f9 border-black border-opacity-5 border-solid border-0.5 w-full">
                        <!-- Здесь может быть форма поиска -->
                        <input type="text" placeholder="Поиск" name="search"
                               class="border-opacity-40 border-[0.5px] border-[#000000] pl-5 text-black lg:py-2 sx:py-1 rounded-2xl outline-none lg:max-w-[25rem] sm:max-w-[15rem] sx:max-w-[10rem] w-full header-input-background">
                        <button type="submit" class="absolute inset-y-0 right-0 pr-2 flex items-center justify-center">
                            <img src="{{ asset('assets/images/search.svg') }}" alt="Поиск" class="">
                        </button>
                    </form>
                </div>
                <div class="flex gap-x-6"><p class="lg:text-2xl sx:text-xl text-[#828282] font-normal text-nowrap">Всего
                        разработчиков</p><span class="lg:text-2xl sx:text-xl font-normal">{{ $total }}</span></div>
            </div>
        </div>
        @if(isset($count))
            @if($count > 0)
                <div class="text-start mb-3 text-xl">По запросу "{{ request()->input('search') }}" найдено {{ $count }}
                    записей
                </div>
            @else
                <div class="text-center mb-3">По запросу "{{ request()->input('search') }}" ничего не найдено</div>
            @endif
        @endif
{{--        @dd($developers)--}}
{{--        @if(!empty($developers)>0)--}}
        @if($developers->count() > 0)
{{--        @if(isset($developers))--}}
            <div class="overflow-x-auto">
                <table class="table-auto w-full text-center">
                    <thead class="border-b">
                    <tr class="">
                        <th class="px-4 py-2">Id</th>
                        <th class="px-4 py-2">Имя</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Статус</th>
                        <th class="px-4 py-2">Блокировка</th>
{{--                        <th class="px-4 py-2">Подробнее</th>--}}
                    </tr>
                    </thead>
                    <tbody class="">
                    @foreach($developers as $developer)
                        <tr class="mb-4">
                            <td class="px-4 py-2 text-nowrap">{{ $developer->id }}</td>
                            <td class="px-4 py-2 text-nowrap">{{ $developer->username }}</td>
                            <td class="px-4 py-2 text-nowrap">{{ $developer->email }}</td>
                            <td class="px-4 py-2 text-nowrap">{{ $developer->status }}</td>
                            <td class="px-4 py-2 text-nowrap">
                                <form action="{{ route('developer.changeStatus', $developer->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <select name="blocked" id="" class="bg-transparent">
                                        <option
                                            value="заблокирован" {{ $developer->blocked === 'заблокирован' ? 'selected' : '' }}>
                                            заблокирован
                                        </option>
                                        <option
                                            value="не блокирован" {{ $developer->blocked === 'не блокирован' ? 'selected' : '' }}>
                                            не блокирован
                                        </option>
                                    </select>
                                    <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить</button>
                                </form>
                            </td>
{{--                            <td class="px-4 py-2 text-nowrap">--}}
{{--                                <button type="submit" class="bg-[#298DFF] px-4 py-1 rounded-xl text-white">Подробнее</button>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @elseif($total==0)
            <div class="text-center mb-3">Записи не найдены</div>
        @else
            <div class="flex"></div>
        @endif
    </div>
@endsection

