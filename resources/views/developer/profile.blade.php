@extends('includes.template')
@section('content')
    <div class="container">
        <div class="flex justify-between items-center mt-20">
            <div class="flex items-center mb-7">
                <img src="{{ asset('assets/images/user.svg') }}" alt="" class="mr-2">
                <p class="mr-3 text-3xl">Super Sell</p>
                <form action="" method="post">
                    @csrf
                    <button type="submit"
                            class="flex text-white gap-0.5 bg-[#298DFF] rounded-lg items-center px-3 py-1"><img
                            src="{{ asset('assets/images/logout.svg') }}" alt="">выйти
                    </button>
                </form>
            </div>
            <div class="flex flex-col items-center gap-2 justify-end">
                <img src="{{ asset('assets/images/data-gray.svg') }}" alt="">
                <p>24 марта 2024</p>
            </div>
        </div>
        <div class="flex justify-between pb-3 border-b border-[#c5c5c5] border-opacity-60">
            <div class="flex gap-x-2 items-end">
                <p class="text-[#828282] text-2xl">разработчик</p>
                <p class="text-green-600 text-xl">активный</p>
            </div>
            <div class="text-2xl text-opacity-80 text-[#828282] flex gap-x-4">Всего <приложени></приложени> <span class="text-black">9</span>
            </div>
        </div>
        <div class="grid grid-cols-4 pb-6 border-b border-[#c5c5c5] border-opacity-60">
            <div class="flex gap-4 mt-6">
                <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                <div class="flex flex-col gap-1">
                    <p class="text-lg">Boom beach</p>
                    <a href="" class="bg-[#298dff] text-white rounded-2xl px-3 py-0.5 text-sm">Подбробнее</a>
                </div>
            </div>
            <div class="flex gap-4 mt-6">
                <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                <div class="flex flex-col gap-1">
                    <p class="text-lg">Boom beach</p>
                    <a href="" class="bg-[#298dff] text-white rounded-2xl px-3 py-0.5 text-sm">Подбробнее</a>
                </div>
            </div>
            <div class="flex gap-4 mt-6">
                <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                <div class="flex flex-col gap-1">
                    <p class="text-lg">Boom beach</p>
                    <a href="" class="bg-[#298dff] text-white rounded-2xl px-3 py-0.5 text-sm">Подбробнее</a>
                </div>
            </div>
            <div class="flex gap-4 mt-6">
                <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                <div class="flex flex-col gap-1">
                    <p class="text-lg">Boom beach</p>
                    <a href="" class="bg-[#298dff] text-white rounded-2xl px-3 py-0.5 text-sm">Подбробнее</a>
                </div>
            </div>
            <div class="flex gap-4 mt-6">
                <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                <div class="flex flex-col gap-1">
                    <p class="text-lg">Boom beach</p>
                    <a href="" class="bg-[#298dff] text-white rounded-2xl px-3 py-0.5 text-sm">Подбробнее</a>
                </div>
            </div>
            <div class="flex gap-4 mt-6">
                <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                <div class="flex flex-col gap-1">
                    <p class="text-lg">Boom beach</p>
                    <a href="" class="bg-[#298dff] text-white rounded-2xl px-3 py-0.5 text-sm">Подбробнее</a>
                </div>
            </div>
            <div class="flex gap-4 mt-6">
                <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                <div class="flex flex-col gap-1">
                    <p class="text-lg">Boom beach</p>
                    <a href="" class="bg-[#298dff] text-white rounded-2xl px-3 py-0.5 text-sm">Подбробнее</a>
                </div>
            </div>
            <div class="flex gap-4 mt-6">
                <img src="{{ asset('assets/images/product-logo.svg') }}" alt="">
                <div class="flex flex-col gap-1">
                    <p class="text-lg">Boom beach</p>
                    <a href="" class="bg-[#298dff] text-white rounded-2xl px-3 py-0.5 text-sm">Подбробнее</a>
                </div>
            </div>
        </div>
        <div class="my-8">
            <canvas id="myChart1"></canvas>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx1 = document.getElementById('myChart1');
            const labels1 = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье']
            new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: labels1,
                    datasets: [{
                        label: 'статистика скачиваний всех приложений за неделю',
                        data: [12, 19, 3, 5, 2, 3],
                        fill: false,
                        borderWidth: 1,
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
@endsection
