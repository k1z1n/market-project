<header class="flex py-7 px-8 items-center justify-between bg-[#298DFF] relative w-full h-full">
    <div class="absolute top-0 left-0 h-screen text-white bg-[#298DFF] z-10 px-8 pt-9 hidden burger-menu-admin transition duration-300 min-w-[300px] w-full max-w-[300px]">
        <div class="accordion mt-14">
            <div class="accordion-up flex items-center justify-between text-[#298DFF] text-2xl bg-white px-3.5 py-3.5 rounded-xl">
                <a href="">Главная</a>
            </div>
        </div>
        <div class="accordion mt-4">
            <div class="accordion-up flex items-center justify-between text-[#298DFF] text-2xl bg-white px-3.5 py-3.5 rounded-xl">Статистика <button class="transform"><img src="{{ asset('img/arrow.svg') }}" alt=""></button></div>
            <div class="accordion-down hidden">
                <div class="flex flex-col mt-2">
                    <a href="" class="text-white text-opacity-85 hover:text-opacity-100 hover:ml-3 ml-6 transition-all duration-300 ease-in-out text-xl">Пользователи</a>
                    <a href="" class="text-white text-opacity-85 hover:text-opacity-100 hover:ml-3 ml-6 transition-all duration-300 ease-in-out text-xl">Заказы</a>
                </div>
            </div>
        </div>
        <div class="accordion mt-4">
            <div class="accordion-up flex items-center justify-between text-[#298DFF] text-2xl bg-white px-3.5 py-3.5 rounded-xl">CRUD<button class="transform"><img src="{{ asset('img/arrow.svg') }}" alt=""></button></div>
            <div class="accordion-down hidden">
                <div class="flex flex-col mt-2 pt-2">
                    <a href="{{ route('admin.type.add') }}" class="text-white text-opacity-85 hover:text-opacity-100 hover:ml-3 ml-6 transition-all duration-300 ease-in-out text-xl">Добавить тип</a>
                    <a href="{{ route('admin.category.add') }}" class="text-white text-opacity-85 hover:text-opacity-100 hover:ml-3 ml-6 transition-all duration-300 ease-in-out text-xl">Добавить категорию</a>
                </div>
            </div>
        </div>
        <div class="accordion mt-4">
            <div class="accordion-up flex items-center justify-between w-full min-w-[200px] text-[#298DFF] text-2xl bg-white px-3.5 py-3.5 rounded-xl">Таблицы <button class="transform"><img src="{{ asset('img/arrow.svg') }}" alt=""></button></div>
            <div class="accordion-down hidden">
                <div class="flex flex-col mt-2">
                    <a href="{{ route('admin.users') }}" class="text-white text-opacity-85 hover:text-opacity-100 hover:ml-3 ml-6 transition-all duration-300 ease-in-out text-xl">Пользователи</a>
                    <a href="{{ route('admin.developers') }}" class="text-white text-opacity-85 hover:text-opacity-100 hover:ml-3 ml-6 transition-all duration-300 ease-in-out text-xl">Разработчики</a>
                    <a href="{{ route('admin.applications') }}" class="text-white text-opacity-85 hover:text-opacity-100 hover:ml-3 ml-6 transition-all duration-300 ease-in-out text-xl">Приложения</a>
                    <a href="{{ route('admin.types') }}" class="text-white text-opacity-85 hover:text-opacity-100 hover:ml-3 ml-6 transition-all duration-300 ease-in-out text-xl">Типы</a>
                    <a href="{{ route('admin.categories') }}" class="text-white text-opacity-85 hover:text-opacity-100 hover:ml-3 ml-6 transition-all duration-300 ease-in-out text-xl">Категория</a>
                </div>
            </div>
        </div>
        <div class="accordion mt-4">
            <div class="accordion-up flex items-center justify-between w-full min-w-[200px] text-[#298DFF] text-2xl bg-white px-3.5 py-3.5 rounded-xl">Баннер <button class="transform"><img src="{{ asset('img/arrow.svg') }}" alt=""></button></div>
            <div class="accordion-down hidden">
                <div class="flex flex-col mt-2">
                    <a href="" class="text-white text-opacity-85 hover:text-opacity-100 hover:ml-3 ml-6 transition-all duration-300 ease-in-out text-xl">Пользователи</a>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col gap-1.5 z-20 burger-menu-click cursor-pointer">
        <div class="h-1 w-8 bg-white rounded-3xl"></div>
        <div class="h-1 w-8 bg-white rounded-3xl"></div>
        <div class="h-1 w-8 bg-white rounded-3xl"></div>
    </div>
    <div class="flex gap-4 items-center">
        <p class="text-white">Алмин-панель</p>
        <a href="{{ route('main') }}"><img src="{{ asset('img/out.svg') }}" alt=""></a>
{{--        <p class="text-white">{{ auth()->user()->phone_number }}</p>--}}
        <div class="rounded-3xl bg-white h-7 w-7"></div>
    </div>
</header>
<script>
    let accord = document.querySelectorAll('.accordion');
    accord.forEach(acc => {
        const up = acc.querySelector('.accordion-up');
        const down = acc.querySelector('.accordion-down');
        const button = acc.querySelector('.accordion-up button');
        up.addEventListener('click', () => {
            button.classList.toggle('rotate-180');
            down.classList.toggle('hidden');
        });
    });
    let burger = document.querySelector('.burger-menu-admin');
    let click = document.querySelector('.burger-menu-click');
    click.addEventListener('click', () => {
        burger.classList.toggle('hidden');
    });
</script>
