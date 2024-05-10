@extends('admin.template')
@section('content')
    <div class="container">
        <div class="mt-20 text-gray-500">Статистика по скачиваниям <a href="" class="text-black text-lg underline">Brawl Stars</a></div>
        <div class="">
            <canvas id="myChart1"></canvas>
        </div>
        <div class="">
            <canvas id="myChart2"></canvas>
        </div>
        <div class="">
            <canvas id="myChart3"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx1 = document.getElementById('myChart1');
            const labels1 = [ 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье']
            new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: labels1,
                    datasets: [{
                        label: 'статистика за неделю',
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
            const ctx2 = document.getElementById('myChart2');
            const labels2 = [ 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь' ]
            new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: labels2,
                    datasets: [{
                        label: 'статистика по месяцам',
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
            const ctx3 = document.getElementById('myChart3');
            const labels3 = ['2024']
            new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: labels3,
                    datasets: [{
                        label: 'статистика по годам',
                        data: [12],
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
