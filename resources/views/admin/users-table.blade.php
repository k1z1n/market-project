@extends('admin.template')
@section('content')
    <div class="container sx:px-2">
        <div class="lg:flex sx:flex sx:flex-col lg:flex-row sx:gap-3 items-center w-full 2xl:mt-20 sx:mt-24 mb-10">
            <div class="text-3xl text-[#298DFF] w-full">Пользователи</div>
            <div
                class="w-full lg:flex lg:flex-row sx:flex sx:gap-3 sx:flex-col-reverse sx:items-start gap-x-3.5 lg:items-center">
                <div class="w-full lg:max-w-[25rem] sm:max-w-[15rem] sx:max-w-[10rem]">
                    <form action="{{ route('admin.users.search') }}" method="get"
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
                        пользователей</p><span class="lg:text-2xl sx:text-xl font-normal">{{ $total }}</span></div>
            </div>
        </div>
        @if(isset($count))
            @if($count > 0)
                <div class="text-start mb-3 text-xl">По запросу "{{ request()->input('search') }}" найдено {{ $count }} записей</div>
            @else
                <div class="text-center mb-3">По запросу "{{ request()->input('search') }}" ничего не найдено</div>
            @endif
        @endif
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-center">
                <thead class="border-b">
                <tr class="">
                    <th class="px-4 py-2">Id</th>
                    <th class="px-4 py-2">Имя</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Статус</th>
                    <th class="px-4 py-2">Блокировка</th>
                </tr>
                </thead>
                <tbody class="">
                @foreach($users as $user)
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap">{{ $user->id }}</td>
                    <td class="px-4 py-2 text-nowrap">{{ $user->username }}</td>
                    <td class="px-4 py-2 text-nowrap">{{ $user->email }}</td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="{{ route('admin.users.update.status', $user->id) }}" method="post">
                            @csrf
                            <select name="status" id="status" class="bg-transparent">
                                <option value="пользователь" {{ $user->status === 'пользователь' ? 'selected' : '' }}>Пользователь</option>
                                <option value="администратор" {{ $user->status === 'администратор' ? 'selected' : '' }}>Администратор</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить</button>
                        </form>
                    </td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="{{ route('admin.users.update.blocked', $user->id) }}" method="post">
                            @csrf
                            <select name="blocked" id="blocked" class="bg-transparent">
                                <option value="не блокирован" {{ $user->blocked === 'не блокирован' ? 'selected' : '' }}>Не блокирован</option>
                                <option value="заблокирован" {{ $user->blocked === 'заблокирован' ? 'selected' : '' }}>Заблокирован</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
