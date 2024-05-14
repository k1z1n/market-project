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
    <div class="container">
        <div class="text-[1.625rem] font-normal pb-4 mt-10">Оценки и отзывы</div>
        <div>
            <form action="{{ route('feedback.add.store')}}" method="post" class="flex flex-col gap-y-5 mb-5" id="review-form">
                @csrf
                <div class="flex flex-col gap-y-5">
                    <div class="stars" data-rating="0" id="rating-stars">
                    </div>
                    <textarea name="message" id="" placeholder="Ваш отзыв..." class="pl-4 pt-4 outline-none  rounded-xl border border-solid border-[#c5c5c5] border-opacity-60 max-w-[1009px]"></textarea>
                </div>
                <input type="hidden" name="application_id" value="{{ $app->id }}">
                <input type="hidden" name="stars" value="" id="rating-input">
                <button type="submit" class="bg-[#298DFF] py-2 px-12 rounded-2xl text-white max-w-44">Отправить</button>
            </form>
        </div>
        <div class="flex lg:flex-row-reverse sx:flex-col lg:items-start sx:items-center sx gap-4 mb-10">
            <div class="flex flex-col items-center lg:pl-14">
                <div class="text-4xl mb-1">{{ $averageRating }}</div>
                <div class="flex gap-1 mb-4">
                    @for($i = 0;$i<$starsCount;$i++)
                        <img src="{{ asset('assets/images/star.svg') }}" alt="" class="w-[1.375rem]">
                    @endfor
                </div>
                <div class="text-[#828282] text-nowrap">10 тыс отзывов</div>
            </div>
            <div class="w-full flex flex-col gap-y-9">
                @foreach ($feedbacks as $review)
                    <div class="w-full rounded-2xl bg-white py-5 px-12">
                        <div class="sx:flex-col lg:flex-row gap-x-4 md:flex items-start">
                            <div class="text-lg">{{ $review->user->username }}</div>
                            <div class="flex lg:flex-row sx:flex-row-reverse gap-x-4 sx:justify-end">
                                <div class="text-[#828282] text-base">{{ $review->created_at }}</div>
                                <div class="flex gap-x-1">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fa-star {{ $i < $review->stars ? 'fas' : 'far' }}"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="max-w-[834px] text-gray-500 text-xl mt-4">{{ $review->message }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ratingStarsContainer = document.getElementById('rating-stars');
            const ratingInput = document.getElementById("rating-input");
            ratingStarsContainer.innerHTML = '';

            // Функция для создания звезд
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

            // Функция для обработки клика на звезду
            function handleStarClick(event) {
                const rating = parseInt(event.currentTarget.dataset.index) + 1;
                ratingInput.value = rating;
                updateStars(ratingStarsContainer, rating);
            }

            // Функция для обновления звезд
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

            // Функция для обновления звезд
            function updateAvgStars(container, rating) {
                container.childNodes.forEach((star, index) => {
                    if (index < rating) {
                        star.classList.add('fas');
                    } else {
                        star.classList.remove('fas');
                    }
                });
            }


            // Создаем звезды для оценки
            createStars(ratingStarsContainer, 5, handleStarClick);

            // Инициализируем звезды с рейтингом по умолчанию
            const defaultRating = 0; // Замените на ваше значение по умолчанию
            updateStars(ratingStarsContainer, defaultRating);
        });
    </script>
@endsection
