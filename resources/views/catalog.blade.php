@extends('includes.template')
@section('content')
    <div class="container sx:px-2">
        <div class="flex justify-between mt-20">
            <div>
                <h2 class="text-black md:text-4xl font-[400] sx:text-3xl">Каталог</h2>
            </div>
            <div class="filter-toggle flex items-center gap-4 cursor-pointer">
                <img src="{{ asset('assets/images/filter.svg') }}" alt="">
                <p>Фильтр</p>
                <img src="{{ asset('assets/images/arrow-down.svg') }}" alt="" class="arrow-down">
            </div>
        </div>
        @if(isset($request))
        <div id="filter-block" class="w-full bg-white shadow-custom rounded-2xl p-5 mt-10 hidden">
            <form action="{{ route('catalog.index') }}" method="get" class="w-full">
                <div class="grid gap-4 w-full md:grid-cols-2 lg:grid-cols-3 gap-x-3.5 sx:grid-cols-1">
                    <div class="lg:w-full lg:max-w-[262px] sx:w-full flex justify-start">
                        <select name="sort" id="sort" onchange="this.form.submit()"
                                class="lg:w-full lg:max-w-[262px] sx:w-full pl-3 rounded-xl py-2 text-lg pr-4 border border-[#C5C5C5] border-opacity-60">
                            <option value="all">Сортировать по...</option>
                            <option value="title_asc" {{ $request->sort == "title_asc" ? 'selected' : ''}}>Названию ↓</option>
                            <option value="title_desc" {{ $request->sort == "title_desc" ? 'selected' : ''}}>Названию ↑</option>
                            <option value="download_count_asc" {{ $request->sort == "download_count_asc" ? 'selected' : ''}}>Количеству скачиваний ↓</option>
                            <option value="download_count_desc" {{ $request->sort == "download_count_desc" ? 'selected' : ''}}>Количеству скачиваний ↑</option>
                            <option value="feedbacks_count_asc" {{ $request->sort == "feedbacks_count_asc" ? 'selected' : ''}}>Количеству отзывов ↓</option>
                            <option value="feedbacks_count_desc" {{ $request->sort == "feedbacks_count_desc" ? 'selected' : ''}}>Количеству отзывов ↑</option>
                        </select>
                    </div>
                    <div class="lg:w-full lg:max-w-[262px] sx:w-full flex justify-start">
                        <select name="category" id="category" onchange="this.form.submit()"
                                class="lg:w-full lg:max-w-[262px] sx:w-full pl-3 rounded-xl py-2 text-lg border border-[#C5C5C5] border-opacity-60">
                            <option value="all">Категории...</option>
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}" {{ ($request->category == $category->id) ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="lg:w-full lg:max-w-[262px] sx:w-full flex justify-start">
                        <select name="type" id="type" onchange="this.form.submit()"
                                class="lg:w-full lg:max-w-[262px] sx:w-full pl-3 rounded-xl py-2 text-lg border border-[#C5C5C5] border-opacity-60">
                            <option value="all">Тип...</option>
                            @foreach($types as $type)
                                <option
                                    value="{{ $type->id }}" {{ ($request->type == $type->id) ? "selected" : "" }}>{{ $type->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="lg:w-full lg:max-w-[262px] sx:w-full flex justify-start">
                            <button type="button" onclick="resetFilters()" class="w-full rounded-xl py-1.5 text-lg bg-[#298DFF] text-white">
                                Сбросить
                            </button>
                    </div>
                </div>
            </form>
        </div>
        @else
            <div id="filter-block" class="w-full bg-white shadow-custom rounded-2xl p-5 mt-10 hidden">
                <form action="{{ route('catalog.index') }}" method="get" class="w-full">
                    <div class="grid gap-4 w-full md:grid-cols-2 lg:grid-cols-3 gap-x-3.5 sx:grid-cols-1">
                        <div class="lg:w-full lg:max-w-[262px] sx:w-full flex justify-start">
                            <select name="sort" id="sort" onchange="this.form.submit()"
                                    class="lg:w-full lg:max-w-[262px] sx:w-full pl-3 rounded-xl py-2 text-lg pr-4 border border-[#C5C5C5] border-opacity-60">
                                <option value="all">Сортировать по...</option>
                                <option value="title_asc">Названию ↓</option>
                                <option value="title_desc">Названию ↑</option>
                                <option value="download_count_asc">Количеству скачиваний ↓</option>
                                <option value="download_count_desc">Количеству скачиваний ↑</option>
                                <option value="feedbacks_count_asc">Количеству отзывов ↓</option>
                                <option value="feedbacks_count_desc">Количеству отзывов ↑</option>
                            </select>
                        </div>
                        <div class="lg:w-full lg:max-w-[262px] sx:w-full flex justify-start">
                            <select name="category" id="category" onchange="this.form.submit()"
                                    class="lg:w-full lg:max-w-[262px] sx:w-full pl-3 rounded-xl py-2 text-lg border border-[#C5C5C5] border-opacity-60">
                                <option value="all">Категории...</option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="lg:w-full lg:max-w-[262px] sx:w-full flex justify-start">
                            <select name="type" id="type" onchange="this.form.submit()"
                                    class="lg:w-full lg:max-w-[262px] sx:w-full pl-3 rounded-xl py-2 text-lg border border-[#C5C5C5] border-opacity-60">
                                <option value="all">Тип...</option>
                                @foreach($types as $type)
                                    <option
                                        value="{{ $type->id }}">{{ $type->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="lg:w-full lg:max-w-[262px] sx:w-full flex justify-start">
                            <button type="button" onclick="resetFilters()" class="w-full pl-3 rounded-xl py-1.5 text-lg bg-[#298DFF] text-white">
                                Сбросить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif

        <script>
            function resetFilters() {
                window.location.href = "{{ route('catalog.index') }}";
            }
            let filterToggle = document.querySelector('.filter-toggle');
            let filterBlock = document.getElementById('filter-block');
            let arrowDown = document.querySelector('.arrow-down');

            filterToggle.addEventListener('click', function () {
                filterBlock.classList.toggle('hidden');
                arrowDown.classList.toggle('rotate-180');
            });
        </script>
        @if(empty($applications))
            <p class="mt-5">Hичего не найдено.</p>
        @elseif(request('query'))
            <p class="mt-5">По запросу "{{ request('query') }}" найдено {{ $applications->count() }} записей.</p>
            <div
                class="grid 2xl:grid-cols-6 2xl:gap-x-3.5 2xl:gap-y-3.5 sx:grid-cols-2 sx:gap-x-3.5 sx:gap-y-3.5 lg:grid-cols-4 md:grid-cols-3 xl:grid-cols-5 mb-10 mt-10">
                @foreach($applications as $app)
                    <a href="{{ route('application.view', $app->id) }}" class="">
                        <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                            <img src="{{ asset('storage/application-logo/' . $app->logo_image) }}" alt="Image 1"
                                 class="max-w-24">
                            <div class="average-color-overlay"></div>
                        </div>
                        <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                            <div class="font-semibold text-base pt-2">{{ $app->title }}</div>
                            <div class="flex justify-between pt-5 items-center">
                                <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                                    {{ round($app->feedbacks_avg_stars, 1) }}
                                    <img src="{{ asset('assets/images/star.svg') }}" alt="">
                                </div>
                                <div>
                                    <button type="submit"
                                            class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                        скачать
                                    </button>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @elseif(!empty($applications))
            <div
                class="grid 2xl:grid-cols-6 2xl:gap-x-3.5 2xl:gap-y-3.5 sx:grid-cols-2 sx:gap-x-3.5 sx:gap-y-3.5 lg:grid-cols-4 md:grid-cols-3 xl:grid-cols-5 mb-10 mt-10">
                @foreach($applications as $app)
                    <a href="{{ route('application.view', $app->id) }}" class="">
                        <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                            <img src="{{ asset('storage/application-logo/' . $app->logo_image) }}" alt="Image 1"
                                 class="max-w-24">
                            <div class="average-color-overlay"></div>
                        </div>
                        <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                            <div class="font-semibold text-base pt-2">{{ $app->title }}</div>
                            <div class="flex justify-between pt-5 items-center">
                                <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                                    {{ round($app->feedbacks_avg_stars, 1) }}
                                    <img src="{{ asset('assets/images/star.svg') }}" alt="">
                                </div>
                                <div>
                                    <button type="submit"
                                            class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                        скачать
                                    </button>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
    <script src="{{ asset('assets/js/image.js') }}" defer></script>
@endsection
