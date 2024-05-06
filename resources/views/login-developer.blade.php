@extends('includes.template')
@section('title', 'main')
@section('content')
    <div class="container sx:px-2 flex justify-center items-center">
        <div class="lg:py-20 lg:px-32 sx:px-20 sx:py-20 rounded-2xl bg-white">
            <div class="max-w-[292px]">
                <div class="mb-10 text-2xl text-center">
                    Авторизация как разработчика
                </div>
                <form action="" method="post" class="flex flex-col mb-4">
                    @csrf
                    <input type="text" name="" id="" placeholder="email..." class="outline-none mb-8 rounded-xl border border-solid border-[#c5c5c5] border-opacity-60 pl-8 py-2">
                    <button type="submit" class="rounded-xl text-white bg-[#298DFF] py-2">Получить код</button>
                </form>
                <div class="text-[10px] text-center max-w-[250px] m-auto">
                    Продолжая, вы соглашаетесь <span class="text-[#298DFF]">со сбором и обработкой персональных данных и пользовательским соглашением</span>
                </div>
            </div>
        </div>
    </div>
@endsection
