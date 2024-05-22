@extends('admin.template')
@section('content')
    <div class="container 2xl:px-2">
        <div class="flex justify-between items-center mt-20">
            <div class="flex items-center mb-7">
                <p class="mr-3 text-3xl">{{ $developer->username }}</p>
            </div>
        </div>
        <div class="flex justify-between pb-3 border-b border-[#c5c5c5] border-opacity-60">
            <div class="flex gap-x-2 items-center">
                <p class="text-[#828282] text-2xl">разработчик</p>
                <form action="{{ route('developer.changeStatus', $developer->id) }}" method="post">
                    @csrf
                    <select name="status" class="text-green-600 text-xl bg-transparent">
                        <option value="активен" {{ $developer->status == 'активен' ? 'selected' : '' }}>активный</option>
                        <option value="заморожен" {{ $developer->status == 'заморожен' ? 'selected' : '' }}>заморожен</option>
                    </select>
                    <button type="submit" class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Применить</button>
                </form>
            </div>
            <div class="text-2xl text-opacity-80 text-[#828282] flex gap-x-4">Всего приложений <span class="text-black">{{ $countApplications }}</span>
            </div>
        </div>
        <div class="flex gap-3.5 mt-6 pb-6 border-b border-[#828282] border-opacity-50 w-full overflow-x-auto">
            <div class="flex flex-col items-center justify-between pr-3.5 border-r border-[#828282] border-opacity-50">
                <div class="flex items-center gap-0.5"><p>{{$averageRating}}</p><img
                        src="{{ asset('assets/images/star.svg') }}"
                        alt=""></div>
                <div class="text-base text-[#828282] text-nowrap">{{ $totalFeedbackCount }} отзывов</div>
            </div>
            <div class="flex flex-col items-center justify-between pr-3.5 border-r border-[#828282] border-opacity-50">
                <div class=""><img src="{{ asset('assets/images/download.svg') }}" alt=""></div>
                <div class="text-base text-[#828282] text-nowrap">{{ $totalDownloadCount }} скачиваний</div>
            </div>
            <div class="flex flex-col items-center justify-between">
                <div class=""><img src="{{ asset('assets/images/data.svg') }}" alt=""></div>
                <div class="text-base text-[#828282] text-nowrap" id="formattedDate">{{ $developer->created_at }}</div>
            </div>
            <script>
                const timestamp = "{{ $developer->created_at }}";
                const formattedDate = formatTimestamp(timestamp);

                document.getElementById('formattedDate').textContent = formattedDate;

                function formatTimestamp(timestamp) {
                    const months = [
                        "января", "февраля", "марта", "апреля", "мая", "июня",
                        "июля", "августа", "сентября", "октября", "ноября", "декабря"
                    ];

                    const parts = timestamp.split(' ')[0].split('-');
                    const day = parts[2];
                    const monthIndex = parseInt(parts[1]) - 1;
                    const month = months[monthIndex];
                    const year = parts[0];

                    return `${day} ${month} ${year}`;
                }
            </script>
        </div>
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-center">
                <thead class="border-b">
                <tr class="">
                    <th class="px-4 py-2">Фото</th>
                    <th class="px-4 py-2">Название</th>
                    <th class="px-4 py-2">Подробнее</th>
                    <th class="px-4 py-2">Удаление</th>
                </tr>
                </thead>
                <tbody class="">
                @foreach($applications as $app)
                    <tr class="mb-4">
                        <td class="px-4 py-2 text-nowrap"><img
                                src="{{ asset('storage/application-logo/' . $app->logo_image) }}"
                                alt="" class="max-w-[76px]">
                        </td>
                        <td class="px-4 py-2 text-nowrap">{{ $app->title }}</td>
                        <td class="px-4 py-2 text-nowrap"><a href="{{ route('application.view', $app->id) }}"
                                                             class="text-white py-1 px-4 bg-[#298dff] rounded-xl">Подробнее
                            </a>
                        </td>
                        <td class="px-4 py-2 text-nowrap">
                            <form action="{{ route('admin.application.delete', $app->id) }}" method="post" id="deleteForm{{ $app->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white py-1 px-4 bg-red-500 rounded-xl delete-button">Удалить</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script defer>
        document.addEventListener('DOMContentLoaded', function () {
            let deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(function (button) {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    let formId = e.target.form.id;
                    let productId = formId.split('deleteForm')[1];
                    if (confirm('Вы уверены, что хотите удалить этот продукт?')) {
                        document.getElementById('deleteForm' + productId).submit();
                    }
                });
            });
        });
    </script>
@endsection
