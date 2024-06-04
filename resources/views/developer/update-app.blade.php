@extends('includes.template')
@section('title', 'main')
@section('content')
    <div class="container">
        <div class="text-[1.375rem] text-[#828282] mt-10 font-[700]">
            Страница игры: <span class="text-black">{{ $application->title }}</span>
        </div>
        @if($application->status  == 'Блокировка')
            <a class="flex items-center gap-2 mb-4">
                <img src="{{ asset('img/red-button.png') }}" alt="" class="h-5">
                Блокировано
            </a>
        @else
            <a class="flex items-center gap-2 mb-4">
                <img src="{{ asset('img/green-button.png') }}" alt="" class="h-5">
                Активно
            </a>
        @endif
        <div class="w-full rounded-2xl shadow-custom mt-10 flex px-9 py-5 gap-x-3 bg-white">
            <div class="">
                <img src="{{ asset('storage/application-logo/' . $application->logo_image) }}" alt=""
                     class="max-h-[88px] h-full">
            </div>
            <div class="h-full">
                <form action="{{ route('developer.application.update.logo', $application->id) }}" method="post"
                      class="flex flex-col justify-between h-full gap-4" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="logo_image" id="">
                    <button type="submit" class="text-lg bg-[#298DFF] rounded-xl text-white py-1.5">изменить
                    </button>
                </form>
            </div>

            <div class="flex flex-col gap-2">
                <form action="{{ route('developer.application.update.title', $application->id) }}" class="flex gap-2"
                      method="post">
                    @csrf
                    <input type="text" name="title" id=""
                           class="border rounded-xl border-opacity-60 border-[#c5c5c5] bg-transparent max-h-[36px] h-full px-1.5 py-2 text-xl text-center"
                           value="{{ $application->title }}">
                    <button type="submit" class="text-lg bg-[#298DFF] rounded-xl text-white px-7 py-1.5">изменить
                    </button>
                </form>
                <form action="{{ route('developer.application.update.age', $application->id) }}" class="flex gap-2"
                      method="post">
                    @csrf
                    <input type="number" name="age" id=""
                           class="border rounded-xl border-opacity-60 border-[#c5c5c5] bg-transparent max-h-[36px] h-full px-1.5 py-2 text-xl text-center"
                           value="{{ $application->age }}">
                    <button type="submit" class="text-lg bg-[#298DFF] rounded-xl text-white px-7 py-1.5">изменить
                    </button>
                </form>
            </div>
            <div class="flex gap-2 flex-col">
                <form action="{{ route('developer.application.update.type', $application->id) }}"
                      class="flex items-center gap-2" method="post">
                    @csrf
                    <select name="type_id" id=""
                            class="border rounded-xl border-opacity-60 border-[#c5c5c5] bg-transparent max-h-[36px] h-full px-1.5 py-2 w-full">
                        @foreach($types as $type)
                            <option
                                value="{{ $type->id }}" {{ $type->id == $application->type_id ? 'selected' : '' }}>{{ $type->title }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="text-lg bg-[#298DFF] rounded-xl text-white px-7 py-1.5">изменить
                    </button>
                </form>
                <form action="{{ route('developer.application.update.category', $application->id) }}"
                      class="flex items-center gap-2 w-full" method="post">
                    @csrf
                    <select name="category_id" id=""
                            class="border rounded-xl border-opacity-60 border-[#c5c5c5] bg-transparent px-1.5 py-2 w-full">
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}" {{ $category->id == $application->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                        @endforeach
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
                @foreach($images as $image)
                    <img src="{{ asset('storage/application-images/'. $image->title) }}" alt="" class="max-h-[80px]">
                @endforeach
            </div>
            <div class="ml-9 pb-5">
                <button type="submit" onclick="openModalPhotos()"
                        class="text-lg bg-[#298DFF] rounded-xl text-white px-7 py-1.5">изменить
                </button>
            </div>
        </div>
        <div class="w-full shadow-custom rounded-2xl mt-11 mb-10">
            <form action="{{ route('developer.application.update.description', $application->id) }}" method="post">
                @csrf
                <div class="w-full text-base font-semibold pl-9 py-3 border-b border-[#c5c5c5] border-opacity-60">
                    Описание
                </div>
                <div class="w-full text-base pl-9 pr-9 py-3 ">
                <textarea type="text" name="description" id=""
                          class="border rounded-xl border-opacity-60 border-[#c5c5c5] bg-transparent w-full px-1.5 py-2 text-xl">{{ $application->description }}</textarea>
                </div>
                <div class="ml-9 pb-5">
                    <button type="submit" class="text-lg bg-[#298DFF] rounded-xl text-white px-7 py-1.5">изменить
                    </button>
                </div>
            </form>
        </div>
        <div class="w-full shadow-custom rounded-2xl mt-11 mb-10 flex">
            <div>
                <div
                    class="w-full text-base font-semibold pl-9 py-3 pr-9 border-b border-[#c5c5c5] border-opacity-60 text-nowrap">
                    Актуальная версия
                </div>
                <div class="flex items-center flex-col h-full">
                    <div class="flex items-center justify-center flex-col w-full gap-2">
                        <button type="button" class="text-lg bg-[#298DFF] rounded-xl text-white px-7 py-1.5"
                                onclick="openModalVersion()">изменить
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div
                    class="w-full text-base font-semibold pl-9 py-3 border-b border-[#c5c5c5] border-opacity-60 flex border-l">
                    Все версия
                </div>
                <div class="pl-9 border-l border-[#c5c5c5] border-opacity-60 pr-9 py-4 flex flex-col gap-2">
                    @foreach($versionApplications as $ver)
                        <div class="grid grid-cols-4 items-center w-full">
                            <div class="">{{ $ver->version }}</div>
                            <div class=""><span class="text-[#828282]">добавлено:</span>{{ $ver->created_at_formatted }}</div>
                            <div class=""><span class="text-[#828282]">размер:</span>{{ $ver->size_formatted }}</div>
                            <div class=""><span class="text-[#828282]">примечание:</span>{{ $ver->note }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="editVersion" class="modal fixed inset-0 hidden z-[100]">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-black opacity-50 pointer-events-none"></div>
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md z-[101]" id="modalWindow">
                <form action="{{ route('developer.application.update.version', $application->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Изменить версию</h3>
                    <input type="text" name="version" placeholder="Версия приложения"
                           class="w-full border border-gray-300 rounded-md p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           required>
                    @error('version')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <textarea name="note" placeholder="Примечание к версии"
                              class="w-full border border-gray-300 rounded-md p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                    @error('note')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <input type="file" name="file" required class="mb-4">
                    @error('file')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <div class="flex gap-x-2">
                        <button type="submit"
                                class="py-2 w-full rounded-md border border-transparent shadow-sm bg-[#298DFF] text-white">
                            Сохранить
                        </button>
                        <button type="button"
                                class="py-2 w-full rounded-md border border-gray-300 shadow-sm bg-gray-300"
                                onclick="closeModalVersion()">
                            Закрыть
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="editPhotos" class="modal fixed inset-0 hidden z-[100]">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-black opacity-50 pointer-events-none"></div>
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md z-[101]" id="modalWindow">
                <form action="{{ route('developer.application.update.images', $application->id) }}" method="post"
                      class="flex flex-col" enctype="multipart/form-data">
                    @csrf
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Изменить фотографии</h3>
                    <input type="file" name="images[]" id="" multiple class="mb-4">

                    <div class="flex gap-x-2">
                        <button type="submit"
                                class="py-2 w-full rounded-md border border-transparent shadow-sm bg-[#298DFF] text-white">
                            Сохранить
                        </button>
                        <button type="button"
                                class="py-2 w-full rounded-md border border-gray-300 shadow-sm bg-gray-300"
                                onclick="closeModalPhotos()">
                            Закрыть
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function openModalVersion() {
            var modal = document.getElementById('editVersion');
            modal.classList.remove('hidden');
        }

        function closeModalVersion() {
            var modal = document.getElementById('editVersion');
            modal.classList.add('hidden');
        }

        function openModalPhotos() {
            var modal = document.getElementById('editPhotos');
            modal.classList.remove('hidden');
        }

        function closeModalPhotos() {
            var modal = document.getElementById('editPhotos');
            modal.classList.add('hidden');
        }
    </script>
    <script src="{{ asset('assets/js/image.js') }}" defer></script>
@endsection
