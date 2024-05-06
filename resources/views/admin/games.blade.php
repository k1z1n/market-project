@extends('includes.template')
@section('content')
    <div class="container 2xl:px-2">
        <div class="flex justify-between items-center mt-20">
            <div class="flex items-center mb-7">
                <p class="mr-3 text-3xl">Super Sell</p>
            </div>
        </div>
        <div class="flex justify-between pb-3 border-b border-[#c5c5c5] border-opacity-60">
            <div class="flex gap-x-2 items-center">
                <p class="text-[#828282] text-2xl">разработчик</p>
                <select class="text-green-600 text-xl bg-transparent">
                    <option value="">активный</option>
                </select>
                <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить
                </button>
            </div>
            <div class="text-2xl text-opacity-80 text-[#828282] flex gap-x-4">Всего приложений <span class="text-black">9</span>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-center">
                <thead class="border-b">
                <tr class="">
                    <th class="px-4 py-2">Фото</th>
                    <th class="px-4 py-2">Название</th>
                    <th class="px-4 py-2">Статус</th>
                    <th class="px-4 py-2">Подробнее</th>
                    <th class="px-4 py-2">Действие</th>
                    <th class="px-4 py-2">Удаление</th>
                </tr>
                </thead>
                <tbody class="">
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap"><img src="{{ asset('assets/images/product-logo.svg') }}" alt=""></td>
                    <td class="px-4 py-2 text-nowrap">Boom Beach</td>
                    <td class="px-4 py-2 text-nowrap">Активен</td>
                    <td class="px-4 py-2 text-nowrap"><a href="" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Подробнее
                        </a>
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
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <button type="submit" class="text-white py-1 px-4 bg-red-500 rounded-xl">Удалить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap"><img src="{{ asset('assets/images/product-logo.svg') }}" alt=""></td>
                    <td class="px-4 py-2 text-nowrap">Boom Beach</td>
                    <td class="px-4 py-2 text-nowrap">Активен</td>
                    <td class="px-4 py-2 text-nowrap"><a href="" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Подробнее
                        </a>
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
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <button type="submit" class="text-white py-1 px-4 bg-red-500 rounded-xl">Удалить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap"><img src="{{ asset('assets/images/product-logo.svg') }}" alt=""></td>
                    <td class="px-4 py-2 text-nowrap">Boom Beach</td>
                    <td class="px-4 py-2 text-nowrap">Активен</td>
                    <td class="px-4 py-2 text-nowrap"><a href="" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Подробнее
                        </a>
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
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <button type="submit" class="text-white py-1 px-4 bg-red-500 rounded-xl">Удалить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap"><img src="{{ asset('assets/images/product-logo.svg') }}" alt=""></td>
                    <td class="px-4 py-2 text-nowrap">Boom Beach</td>
                    <td class="px-4 py-2 text-nowrap">Активен</td>
                    <td class="px-4 py-2 text-nowrap"><a href="" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Подробнее
                        </a>
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
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <button type="submit" class="text-white py-1 px-4 bg-red-500 rounded-xl">Удалить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap"><img src="{{ asset('assets/images/product-logo.svg') }}" alt=""></td>
                    <td class="px-4 py-2 text-nowrap">Boom Beach</td>
                    <td class="px-4 py-2 text-nowrap">Активен</td>
                    <td class="px-4 py-2 text-nowrap"><a href="" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Подробнее
                        </a>
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
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <button type="submit" class="text-white py-1 px-4 bg-red-500 rounded-xl">Удалить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap"><img src="{{ asset('assets/images/product-logo.svg') }}" alt=""></td>
                    <td class="px-4 py-2 text-nowrap">Boom Beach</td>
                    <td class="px-4 py-2 text-nowrap">Активен</td>
                    <td class="px-4 py-2 text-nowrap"><a href="" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Подробнее
                        </a>
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
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <button type="submit" class="text-white py-1 px-4 bg-red-500 rounded-xl">Удалить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap"><img src="{{ asset('assets/images/product-logo.svg') }}" alt=""></td>
                    <td class="px-4 py-2 text-nowrap">Boom Beach</td>
                    <td class="px-4 py-2 text-nowrap">Активен</td>
                    <td class="px-4 py-2 text-nowrap"><a href="" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Подробнее
                        </a>
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
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <button type="submit" class="text-white py-1 px-4 bg-red-500 rounded-xl">Удалить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap"><img src="{{ asset('assets/images/product-logo.svg') }}" alt=""></td>
                    <td class="px-4 py-2 text-nowrap">Boom Beach</td>
                    <td class="px-4 py-2 text-nowrap">Активен</td>
                    <td class="px-4 py-2 text-nowrap"><a href="" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Подробнее
                        </a>
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
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <button type="submit" class="text-white py-1 px-4 bg-red-500 rounded-xl">Удалить
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="px-4 py-2 text-nowrap"><img src="{{ asset('assets/images/product-logo.svg') }}" alt=""></td>
                    <td class="px-4 py-2 text-nowrap">Boom Beach</td>
                    <td class="px-4 py-2 text-nowrap">Активен</td>
                    <td class="px-4 py-2 text-nowrap"><a href="" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Подробнее
                        </a>
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
                    <td class="px-4 py-2 text-nowrap">
                        <form action="" method="post">
                            <button type="submit" class="text-white py-1 px-4 bg-red-500 rounded-xl">Удалить
                            </button>
                        </form>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
