@extends('includes.template')
@section('content')
    <div class="container sx:px-2">
        <div class="lg:flex sx:flex sx:flex-col lg:flex-row sx:gap-3 items-center w-full 2xl:mt-20 sx:mt-24 mb-10">
            <div class="text-3xl text-[#298DFF] w-full">Пользователи</div>
            <div
                class="w-full lg:flex lg:flex-row sx:flex sx:gap-3 sx:flex-col-reverse sx:items-start gap-x-3.5 lg:items-center">
                <div class="w-full lg:max-w-[25rem] sm:max-w-[15rem] sx:max-w-[10rem]">
                    <form action="" method="post"
                          class="relative bg-f9f9f9 border-black border-opacity-5 border-solid border-0.5 w-full">
                        <!-- Здесь может быть форма поиска -->
                        <input type="text" placeholder="Поиск"
                               class="border-opacity-40 border-[0.5px] border-[#000000] pl-5 text-black lg:py-2 sx:py-1 rounded-2xl outline-none lg:max-w-[25rem] sm:max-w-[15rem] sx:max-w-[10rem] w-full header-input-background">
                        <button type="submit" class="absolute inset-y-0 right-0 pr-2 flex items-center justify-center">
                            <img src="{{ asset('assets/images/search.svg') }}" alt="Поиск" class="">
                        </button>
                    </form>
                </div>
                <div class="flex gap-x-6"><p class="lg:text-2xl sx:text-xl text-[#828282] font-normal text-nowrap">Всего
                        приложений</p><span class="lg:text-2xl sx:text-xl font-normal">9</span></div>
            </div>
        </div>
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
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap">1</td>
                    <td class="px-4 py-2 text-nowrap">Рома</td>
                    <td class="px-4 py-2 text-nowrap">email@email.ru</td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Пользователь</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Блокировать</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap">1</td>
                    <td class="px-4 py-2 text-nowrap">Рома</td>
                    <td class="px-4 py-2 text-nowrap">email@email.ru</td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Пользователь</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Блокировать</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap">1</td>
                    <td class="px-4 py-2 text-nowrap">Рома</td>
                    <td class="px-4 py-2 text-nowrap">email@email.ru</td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Пользователь</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Блокировать</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap">1</td>
                    <td class="px-4 py-2 text-nowrap">Рома</td>
                    <td class="px-4 py-2 text-nowrap">email@email.ru</td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Пользователь</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Блокировать</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap">1</td>
                    <td class="px-4 py-2 text-nowrap">Рома</td>
                    <td class="px-4 py-2 text-nowrap">email@email.ru</td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Пользователь</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Блокировать</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap">1</td>
                    <td class="px-4 py-2 text-nowrap">Рома</td>
                    <td class="px-4 py-2 text-nowrap">email@email.ru</td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Пользователь</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Блокировать</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap">1</td>
                    <td class="px-4 py-2 text-nowrap">Рома</td>
                    <td class="px-4 py-2 text-nowrap">email@email.ru</td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Пользователь</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Блокировать</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap">1</td>
                    <td class="px-4 py-2 text-nowrap">Рома</td>
                    <td class="px-4 py-2 text-nowrap">email@email.ru</td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Пользователь</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Блокировать</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap">1</td>
                    <td class="px-4 py-2 text-nowrap">Рома</td>
                    <td class="px-4 py-2 text-nowrap">email@email.ru</td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Пользователь</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Блокировать</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap">1</td>
                    <td class="px-4 py-2 text-nowrap">Рома</td>
                    <td class="px-4 py-2 text-nowrap">email@email.ru</td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Пользователь</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Блокировать</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap">1</td>
                    <td class="px-4 py-2 text-nowrap">Рома</td>
                    <td class="px-4 py-2 text-nowrap">email@email.ru</td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Пользователь</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <select name="" id="" class="bg-transparent">
                                <option value="">Блокировать</option>
                            </select>
                            <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                            </button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
