@extends('includes.template')
@section('title', 'TatApps')
@section('content')
    <div class="container sx:px-2 flex justify-center items-center">
        <div class="lg:py-20 lg:px-32 sx:px-20 sx:py-20 rounded-2xl bg-white">
            <div class="max-w-[292px]">
                <div class="mb-10 text-2xl text-center">
                    Добавить приложение
                </div>
                <form action="{{ route('developer.application.store') }}" method="post" class="flex flex-col mb-4 gap-y-4" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" id="" value="{{ old('title') }}" placeholder="Название*" class="outline-none  rounded-xl border border-solid border-[#c5c5c5] border-opacity-60 pl-8 py-2">
                    @error('title')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <input type="text" name="age" value="{{ old('age') }}" id="" placeholder="Возраст*" class="outline-none  rounded-xl border border-solid border-[#c5c5c5] border-opacity-60 pl-8 py-2">
                    @error('age')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <textarea name="description" id="" placeholder="Описание*" class="outline-none  rounded-xl border border-solid border-[#c5c5c5] border-opacity-60 pl-8 py-2">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <select name="type_id" id="" class="outline-none  rounded-xl border border-solid border-[#c5c5c5] border-opacity-60 pl-8 py-2">
                        <option value="" selected>Выбрать тип</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <select name="category_id" id="" class="outline-none  rounded-xl border border-solid border-[#c5c5c5] border-opacity-60 pl-8 py-2">
                        <option value="" selected>Выбрать категорию</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="logo_image" class="block mb-[-10px] mt-[-10px] ml-2.5 text-gray-500">Логотип*</label>
                    <input type="file" name="logo_image" id="logo_image" class="outline-none  rounded-xl border border-solid border-[#c5c5c5] border-opacity-60 pl-8 py-2">
                    @error('logo_image')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror

                    <label for="banner_image" class="block mb-[-10px] mt-[-10px] ml-2.5 text-gray-500">Баннер*</label>
                    <input type="file" name="banner_image" id="banner_image" class="outline-none  rounded-xl border border-solid border-[#c5c5c5] border-opacity-60 pl-8 py-2">
                    @error('banner_image')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <input type="text" name="version" id="" value="{{ old('version') }}" placeholder="Версия*" class="outline-none  rounded-xl border border-solid border-[#c5c5c5] border-opacity-60 pl-8 py-2">
                    @error('version')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror

                    <textarea name="note" id="" placeholder="Примечание..." class="outline-none  rounded-xl border border-solid border-[#c5c5c5] border-opacity-60 pl-8 py-2">{{ old('note') }}</textarea>
                    @error('note')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="app" class="block mb-[-10px] mt-[-10px] ml-2.5 text-gray-500">Версия*</label>
                    <input type="file" name="app" id="app">
                    @error('app')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="rounded-xl text-white bg-[#298DFF] py-2">Добавить</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/image.js') }}" defer></script>
@endsection
