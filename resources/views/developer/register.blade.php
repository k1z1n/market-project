@extends('includes.template')
@section('title', 'TatApps')
@section('content')
    <div class="container sx:px-2 flex justify-center items-center">
        <div class="lg:py-20 lg:px-32 sx:px-20 sx:py-20 rounded-2xl bg-white">
            <div class="max-w-[292px]">
                <div class="mb-10 text-2xl text-center">
                    Регистарция разработчика
                </div>
                <form action="{{ route('developer.auth.register.store') }}" method="post" class="flex flex-col mb-4 gap-y-5">
                    @csrf
                    <input type="text" name="username" value="{{ old('username') }}" id="" placeholder="Имя*" class="outline-none rounded-xl border border-solid border-[#c5c5c5] border-opacity-60 pl-8 py-2">
                    @error('username')
                    <div class="text-center text-red-600">{{ $message }}</div>
                    @enderror
                    <input type="email" name="email" id="" value="{{ old('email') }}" placeholder="Email*" class="outline-none rounded-xl border border-solid border-[#c5c5c5] border-opacity-60 pl-8 py-2">
                    @error('email')
                    <div class="text-center text-red-600">{{ $message }}</div>
                    @enderror
                    <input type="password" name="password" id="" placeholder="Пароль*" class="outline-none rounded-xl border border-solid border-[#c5c5c5] border-opacity-60 pl-8 py-2">
                    @error('password')
                    <div class="text-center text-red-600">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="rounded-xl text-white bg-[#298DFF] py-2">Регистрация</button>
                </form>
                <a href="{{ route('developer.auth.login') }}" class="flex justify-center text-[#298DFF] mb-3">Войти в аккаунт</a>
                <div class="text-[10px] text-center max-w-[250px] m-auto">
                    Продолжая, вы соглашаетесь <span class="text-[#298DFF] cursor-pointer">со сбором и обработкой персональных данных и пользовательским соглашением</span>
                </div>
            </div>
        </div>
    </div>
@endsection
