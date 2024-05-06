@extends('includes.template')
@section('title', 'main')
@section('content')
    <div class="container sx:px-2 flex justify-center items-center">
        <div class="lg:py-20 lg:px-32 sx:px-20 sx:py-20 rounded-2xl bg-white">
            <div class="max-w-[292px]">
                <div class="mb-10 text-2xl text-center">
                    Редактировать категорию
                </div>
                <form action="{{ route('admin.category.update', $category->id) }}" method="post" class="flex flex-col mb-4">
                    @csrf
                    @method('PUT')
                    <input type="text" name="title" id="" placeholder="название..." value="{{ $category->title }}"
                           class="outline-none mb-8 rounded-xl border border-solid border-[#c5c5c5] border-opacity-60 pl-8 py-2">
                    @error('title')
                    <div class="text-red-700">
                        {{ $message }}
                    </div>
                    @enderror
                    <button type="submit" class="rounded-xl text-white bg-[#298DFF] py-2">Изменить</button>
                </form>
            </div>
        </div>
    </div>
    @include('includes.message')
@endsection
