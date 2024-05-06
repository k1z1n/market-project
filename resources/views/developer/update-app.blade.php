@extends('includes.template')
@section('title', 'main')
@section('content')
    <div class="container">
        <div class="text-[1.375rem] text-[#828282] mt-10 font-[700]">
            Страница игры: <span class="text-black">Boob Beach</span>
        </div>
        <div class="w-full rounded-2xl shadow-custom mt-10 flex px-9 py-5 gap-x-12 bg-white">
            <div class="">
                <img src="{{ asset('assets/images/product-logo.svg') }}" alt="" class="max-h-[88px] h-full">
            </div>
            <div class="h-full">
                <form action="" method="post" class="flex flex-col justify-between h-full gap-4">
                    <input type="file" name="" id="">
                    <button type="submit" class="text-lg bg-[#298DFF] rounded-xl text-white px-7 py-1.5">изменить
                    </button>
                </form>
            </div>
            <div class="flex flex-col gap-2">
                <form action="" class="flex gap-2">
                    <input type="text" name="" id=""
                           class="border rounded-xl border-opacity-60 border-[#c5c5c5] bg-transparent max-h-[36px] h-full px-1.5 py-2 text-xl text-center"
                           value="Boom Beach">
                    <button type="submit" class="text-lg bg-[#298DFF] rounded-xl text-white px-7 py-1.5">изменить
                    </button>
                </form>
                <form action="" class="flex gap-2">
                    <input type="number" name="" id=""
                           class="border rounded-xl border-opacity-60 border-[#c5c5c5] bg-transparent max-h-[36px] h-full px-1.5 py-2 text-xl text-center"
                           value="16">
                    <button type="submit" class="text-lg bg-[#298DFF] rounded-xl text-white px-7 py-1.5">изменить
                    </button>
                </form>
            </div>
            <div class="flex gap-2 flex-col">
                <form action="" class="flex items-center gap-2">
                    <select name="" id=""
                            class="border rounded-xl border-opacity-60 border-[#c5c5c5] bg-transparent max-h-[36px] h-full px-1.5 py-2 w-full">
                        <option value="">игра</option>
                    </select>
                    <button type="submit" class="text-lg bg-[#298DFF] rounded-xl text-white px-7 py-1.5">изменить
                    </button>
                </form>
                <form action="" class="flex items-center gap-2 w-full">
                    <select name="" id=""
                            class="border rounded-xl border-opacity-60 border-[#c5c5c5] bg-transparent px-1.5 py-2 w-full">
                        <option value="">активна</option>
                    </select>
                    <button type="submit" class="text-lg bg-[#298DFF] rounded-xl text-white px-7 py-1.5">изменить
                    </button>
                </form>
            </div>
        </div>
        <div class="w-full shadow-custom rounded-2xl mt-11 mb-10">
            <div class="w-full text-base font-semibold pl-9 py-3 border-b border-[#c5c5c5] border-opacity-60">
                Фотографии
            </div>
            <div class="w-full pl-9 flex gap-2 mt-4 overflow-x-auto mb-7">
                <img src="{{ asset('assets/images/application-image.svg') }}" alt="" class="max-h-[80px]">
                <img src="{{ asset('assets/images/application-image.svg') }}" alt="" class="max-h-[80px]">
                <img src="{{ asset('assets/images/application-image.svg') }}" alt="" class="max-h-[80px]">
                <img src="{{ asset('assets/images/application-image.svg') }}" alt="" class="max-h-[80px]">
                <img src="{{ asset('assets/images/application-image.svg') }}" alt="" class="max-h-[80px]">
                <img src="{{ asset('assets/images/application-image.svg') }}" alt="" class="max-h-[80px]">
                <img src="{{ asset('assets/images/application-image.svg') }}" alt="" class="max-h-[80px]">
                <img src="{{ asset('assets/images/application-image.svg') }}" alt="" class="max-h-[80px]">
                <img src="{{ asset('assets/images/application-image.svg') }}" alt="" class="max-h-[80px]">
                <img src="{{ asset('assets/images/application-image.svg') }}" alt="" class="max-h-[80px]">
            </div>
            <div class="ml-9 pb-5">
                <button type="submit" class="text-lg bg-[#298DFF] rounded-xl text-white px-7 py-1.5">изменить</button>
            </div>
        </div>
        <div class="w-full shadow-custom rounded-2xl mt-11 mb-10">
            <div class="w-full text-base font-semibold pl-9 py-3 border-b border-[#c5c5c5] border-opacity-60">
                Описание
            </div>
            <div class="w-full text-base pl-9 pr-9 py-3 ">
                <textarea type="text" name="" id=""
                          class="border rounded-xl border-opacity-60 border-[#c5c5c5] bg-transparent w-full px-1.5 py-2 text-xl">ewqjewqeiojwq ejwqoiej iqwjeo wioeioqwj eiowjqio ejqwio ejioqweio jqwoe ioqw oiejqwioe jqwioej ioqwjeoiqeoi qwjioe jqwoie ioqwje oqwjeoi qioe qio jeioqwje iojqeoi jqwoiejqwe oiqwjeoi qwjei jqwioj qwejqwjoe jqwoie jqwoiej ioqwjeo iqwjeoiqwjeoi jqwiojioj ioeqwoi ejioqwej ioqwjioqw jwioqje qowj eoiqjeioqwje ioqjwoie jqwioe jqwioj ewjqoejhwquioej qwe owqeqw ueowq ueoiqw eoqwo eoqwe oqwoeoqwioeoqwieoiqwioeoiqweuoi qwoeo qwoe</textarea>
            </div>
            <div class="ml-9 pb-5">
                <button type="submit" class="text-lg bg-[#298DFF] rounded-xl text-white px-7 py-1.5">изменить</button>
            </div>
        </div>
        <div class="w-full shadow-custom rounded-2xl mt-11 mb-10 flex">
            <div>
                <div class="w-full text-base font-semibold pl-9 py-3 border-b border-[#c5c5c5] border-opacity-60">
                    Актуальная версия
                </div>
                <div class="flex items-center justify-center">
                    <form action="" method="post" class="flex items-center justify-center flex-col h-full w-full gap-2">
                        <input type="file" name="" id="">
                        <button type="submit" class="text-lg bg-[#298DFF] rounded-xl text-white px-7 py-1.5">изменить
                        </button>
                    </form>
                </div>
            </div>
            <div class="w-full">
                <div class="w-full text-base font-semibold pl-9 py-3 border-b border-[#c5c5c5] border-opacity-60 flex border-l">
                    Все версия
                </div>
                <div class="pl-9 border-l border-[#c5c5c5] border-opacity-60 pr-9 py-4 flex flex-col gap-2">
                    <div class="flex justify-between items-center w-full">
                        <div class="">1.0</div>
                        <div class=""><span class="text-[#828282]">добавлено:</span>  03.03.24</div>
                        <div class=""><span class="text-[#828282]">размер:</span>  15МБ</div>
                        <div class=""><span class="text-[#828282]">примечание:</span>  обновлено то или что-то</div>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <div class="">1.0</div>
                        <div class=""><span class="text-[#828282]">добавлено:</span>  03.03.24</div>
                        <div class=""><span class="text-[#828282]">размер:</span>  15МБ</div>
                        <div class=""><span class="text-[#828282]">примечание:</span>  обновлено то или что-то</div>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <div class="">1.0</div>
                        <div class=""><span class="text-[#828282]">добавлено:</span>  03.03.24</div>
                        <div class=""><span class="text-[#828282]">размер:</span>  15МБ</div>
                        <div class=""><span class="text-[#828282]">примечание:</span>  обновлено то или что-то</div>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <div class="">1.0</div>
                        <div class=""><span class="text-[#828282]">добавлено:</span>  03.03.24</div>
                        <div class=""><span class="text-[#828282]">размер:</span>  15МБ</div>
                        <div class=""><span class="text-[#828282]">примечание:</span>  обновлено то или что-то</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/image.js') }}" defer></script>
@endsection
