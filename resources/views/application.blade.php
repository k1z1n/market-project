@extends('includes.template')
@section('title', 'main')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .stars {
            display: inline-block;
        }

        .fa-star {
            color: #ff9c1a;
            cursor: pointer;
        }
    </style>
    <div class="container sx:px-2">
        <div class="w-full rounded-2xl shadow-custom mt-20 lg:px-9 sx:px-4 lg:py-5 sx:py-2">
            <div class="flex gap-x-12">
                <div class=""><img src="{{ asset('storage/application-logo/' . $application->logo_image) }}" alt=""
                                   class="max-h-[88px] h-full">
                </div>
                <div class="">
                    <div class="font-[700] text-[1.375rem] pb-2">{{ $application->title }}</div>
                    <div class="text-[#298DFF] text-lg pb-3"><a
                            href="{{ route('developer.one', $application->developer->id) }}">{{ $application->developer->username }}</a>
                    </div>
                    <div class="lg:flex gap-x-2.5 mb-3.5 sx:hidden">
                        <div
                            class="flex flex-col items-center justify-between border-r border-opacity-60 border-[#828282] pr-2.5">
                            <div class="flex gap-x-1">
                                <p>@if($averageRating >0)
                                        {{ $averageRating }}
                                    @endif</p>
                                <img src="{{ asset('assets/images/star.svg') }}" alt=""></div>
                            <div class="text-sm text-[#828282]">@if($feedbackCount>0)
                                    {{ $feedbackCount }} отзыва
                                @else
                                    Нету отзывов
                                @endif
                            </div>
                        </div>
                        <div
                            class="flex flex-col items-center justify-between border-r border-opacity-60 border-[#828282] pr-2.5">
                            <div class=""><img src="{{ asset('assets/images/download-gray.svg') }}" alt=""></div>
                            <div class="text-sm">{{ $application->size }}</div>
                        </div>
                        <div
                            class="flex flex-col items-center justify-between border-r border-opacity-60 border-[#828282] pr-2.5">
                            <div class="">{{ $application->download_count }}</div>
                            <div class="text-sm text-[#828282]">Скачиваний</div>
                        </div>
                        <div
                            class="flex flex-col items-center justify-between border-r border-opacity-60 border-[#828282] pr-2.5">
                            <div class="">{{ $application->age }}+</div>
                            <div class="text-sm text-[#828282]">Возраст</div>
                        </div>
                        <div class="flex flex-col items-center justify-between">
                            <div class=""><img src="{{ asset('assets/images/data-gray.svg') }}" alt=""></div>
                            <div class="text-sm" id="formattedDate">{{ $application->created_at }}</div>
                        </div>
                    </div>
                    <div class="">
                        <a href="{{ route('application.download', $application->id) }}"
                           class="bg-[#298DFF] py-2 px-12 rounded-2xl text-white">Скачать</a>
                    </div>
                </div>
            </div>
            <div class="flex gap-x-2.5 mb-2.5 overflow-x-auto lg:hidden mt-10 w-full">
                <div
                    class="flex flex-col items-center justify-between border-r border-opacity-60 border-[#828282] pr-2.5">
                    <div class="flex"><p>4.1</p><img src="{{ asset('assets/images/star.svg') }}" alt=""></div>
                    <div class="text-sm text-[#828282] text-nowrap">10 отзывов</div>
                </div>
                <div
                    class="flex flex-col items-center justify-between border-r border-opacity-60 border-[#828282] pr-2.5">
                    <div class=""><img src="{{ asset('assets/images/download-gray.svg') }}" alt=""></div>
                    <div class="text-sm text-nowrap">15 мб</div>
                </div>
                <div
                    class="flex flex-col items-center justify-between border-r border-opacity-60 border-[#828282] pr-2.5">
                    <div class="">150 000</div>
                    <div class="text-sm text-[#828282] text-nowrap">скачиваний</div>
                </div>
                <div
                    class="flex flex-col items-center justify-between border-r border-opacity-60 border-[#828282] pr-2.5">
                    <div class="">{{ $application->age }}+</div>
                    <div class="text-sm text-[#828282] text-nowrap">возраст</div>
                </div>
                <div class="flex flex-col items-center justify-between">
                    <div class=""><img src="{{ asset('assets/images/data-gray.svg') }}" alt=""></div>
                    <div class="text-sm text-nowrap">24 марта 2024</div>
                </div>
            </div>
        </div>
        <div class="w-full overflow-hidden">
            <div class="flex mt-10 overflow-x-auto gap-4 max-h-[285px]">
                @foreach($application->images as $app)
                    <img src="{{ asset('storage/application-images/' . $app->title) }}" alt=""
                         class="h-full w-full object-cover max-h-[285px]">
                @endforeach
            </div>
        </div>
        {{--        <script src="{{ asset('assets/js/slider-application.js') }}" defer></script>--}}
        <div class="w-full shadow-custom rounded-2xl mt-11 mb-10 bg-white">
            <div class="w-full text-base font-semibold pl-9 py-3 border-b border-[#c5c5c5] border-opacity-60">
                Описание
            </div>
            <div class="w-full text-base pl-9 py-3">
                {{ $application->description }}
            </div>
        </div>
        <div class="">
            <div class="text-[1.625rem] font-normal pb-4">Оценки и отзывы</div>
            @if(count($feedbacks)>0)
                <div class="flex lg:flex-row-reverse sx:flex-col lg:items-start sx:items-center sx gap-4">
                    @else
                        <div
                            class="flex lg:justify-between lg:flex-row-reverse sx:flex-col lg:items-start sx:items-center sx gap-4">
                            @endif
                            <div class="flex flex-col items-center lg:pl-14">
                                <div class="text-4xl mb-1">@if($averageRating>0)
                                        {{ $averageRating }}
                                    @endif</div>
                                <div class="flex gap-1 mb-4">
                                    <div id="rating"></div>
                                    @for($i = 0;$i<$starsCount;$i++)
                                        <img src="{{ asset('assets/images/star.svg') }}" alt="" class="w-[1.375rem]">
                                    @endfor
                                </div>
                                <div class="text-[#828282] text-nowrap">@if($feedbackCount>0)
                                        {{ $feedbackCount }} отзыва
                                    @else
                                        нету отзывов
                                    @endif</div>
                            </div>
                            @if(count($feedbacks)>0)
                                <div class="w-full flex flex-col gap-y-9">
                                    @foreach($feedbacks as $feed)
                                        <div class="w-full rounded-2xl bg-white py-5 px-12">
                                            <div class="sx:flex-col lg:flex-row gap-x-4 md:flex items-start">
                                                <div class="text-lg">{{ $feed->user->username }}</div>
                                                <div
                                                    class="flex lg:flex-row sx:flex-row-reverse gap-x-4 sx:justify-end">
                                                    <div class="text-[#828282] text-base feedback"
                                                         data-timestamp="{{ $feed->created_at }}" id="feedback">18 марта
                                                        2024
                                                    </div>
                                                    <div class="flex gap-x-1">
                                                        @for ($i = 0; $i < 5; $i++)
                                                            <i class="fa-star {{ $i < $feed->stars ? 'fas' : 'far' }}"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="max-w-[834px] text-gray-500 text-xl mt-4">{{$feed->message}}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <a class="text-[#298DFF] text-xl ml-12 mt-5" href="{{ route('feedback.view', $application->id) }}">Написать отзыв</a>
                            @endif
                        </div>
                        @if(count($feedbacks)>0)
                            <div class="text-[#298DFF] text-xl ml-12 mt-5">
                                <a href="{{ route('feedback.view', $application->id) }}">Читать все</a>
                            </div>
                        @endif
                </div>
                <div class="mb-10">
                    <div class="text-[1.625rem] font-normal mb-9 mt-14">Похожее</div>
                    <div class="flex gap-x-[1.875rem] overflow-x-auto">
                        @foreach($other as $ot)
                            <a href="{{ route('application.view', $ot->id) }}" class="">
                                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                                    <img src="{{ asset('storage/application-logo/' . $ot->logo_image) }}" alt="Image 1"
                                         class="max-w-24">
                                    <div class="average-color-overlay"></div>
                                </div>
                                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                                    <div class="font-semibold text-base pt-2">{{ $ot->title }}</div>
                                    <div class="flex justify-between pt-5 items-center">
                                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                                            @if($ot->average_rating>0)
                                                {{ $ot->average_rating }}
                                            @endif
                                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                                        </div>
                                        <div>
                                            <button type="button"
                                                    class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5 download-button"
                                                    data-id="{{ $ot->id }}">
                                                Скачать
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const ratingStarsContainer = document.getElementById('rating-stars');
                const averageStarsContainer = document.getElementById('average-stars');
                averageStarsContainer.innerHTML = '';
                ratingStarsContainer.innerHTML = '';

                function createStars(container, count, onClick) {
                    for (let i = 0; i < count; i++) {
                        const star = document.createElement('i');
                        star.classList.add('fa-star', 'fa-lg', 'pointer-events-auto');
                        star.dataset.index = i;
                        if (onClick) {
                            star.addEventListener('click', onClick);
                        }
                        container.appendChild(star);
                    }
                }

                function handleStarClick(event) {
                    const rating = parseInt(event.currentTarget.dataset.index) + 1;
                    ratingInput.value = rating;
                    updateStars(ratingStarsContainer, rating);
                }

                function updateStars(container, rating) {
                    container.childNodes.forEach((star, index) => {
                        if (index < rating) {
                            star.classList.remove('far');
                            star.classList.add('fas');
                        } else {
                            star.classList.remove('fas');
                            star.classList.add('far');
                        }
                    });
                }

                function createAvgStars(container, count) {
                    for (let i = 0; i < count; i++) {
                        const star = document.createElement('i');
                        star.classList.add('fa-star', 'fa-lg');
                        container.appendChild(star);
                    }
                }

                function updateAvgStars(container, rating) {
                    container.childNodes.forEach((star, index) => {
                        if (index < rating) {
                            star.classList.add('fas');
                        } else {
                            star.classList.remove('fas');
                        }
                    });
                }

                createStars(ratingStarsContainer, 5, handleStarClick);

                const defaultRating = 0;
                updateStars(ratingStarsContainer, defaultRating);

                const averageRating = {{ $averageRating }};
                const roundedAverageRating = Math.round(averageRating);
                createAvgStars(averageStarsContainer, 5, handleStarClick);
                updateAvgStars(averageStarsContainer, roundedAverageRating);
            });
        </script>
        <script defer>
            const timestamp = "{{ $application->created_at }}";
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

            const feedback = document.querySelectorAll('.feedback')
            feedback.forEach(element => {
                const timestamp = element.dataset.timestamp;
                element.textContent = formatTimestamp(timestamp)
            })
        </script>
        <script src="{{ asset('assets/js/image.js') }}" defer></script>
@endsection
