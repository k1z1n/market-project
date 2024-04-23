<header class="max-w-[1200px] m-auto 2xl:sticky 2xl:top-[10px] z-50 w-full bg-white 2xl:backdrop-blur-3xl text-white flex items-center justify-between 2xl:rounded-3xl sx:absolute">
    <div class="flex items-center justify-between w-full py-4 px-[2.625rem]">
        <!-- Первый блок -->
        <div class="2xl:mr-10 text-black">
            <h1>лого</h1>
        </div>
        <!-- Второй блок -->
        <div class="w-full m-auto lg:max-w-[25rem] sm:max-w-[15rem] sx:max-w-[10rem]">
            <form action="" method="post" class="relative bg-f9f9f9 border-black border-opacity-5 border-solid border-0.5 w-full">
                <!-- Здесь может быть форма поиска -->
                <input type="text" placeholder="Поиск"  class="pl-5 text-black lg:py-2 sx:py-1 rounded-2xl outline-none lg:max-w-[25rem] sm:max-w-[15rem] sx:max-w-[10rem] w-full header-input-background">
                <button type="submit" class="absolute inset-y-0 right-0 pr-2 flex items-center justify-center">
                    <img src="{{ asset('assets/images/search.svg') }}" alt="Поиск" class="">
                </button>
            </form>
        </div>
        <div class="bg-[#f9f9f9] px-[7px] py-[5px] rounded-3xl">
            <a href="">
                <img src="{{ asset('assets/images/profile.svg') }}" alt="Профиль" class="">
            </a>
        </div>
    </div>
</header>
