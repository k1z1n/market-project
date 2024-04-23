@extends('includes.template')
@section('content')
    <img src="{{ asset('assets/images/previe.svg') }}" alt=""
         class="w-full h-auto absolute 2xl:top-0 sx:top-12 left-0 object-cover brightness-50 z-[1]">
    <div class="container z-10 relative sx:px-2">
        <h2 class="text-white 2xl:text-5xl lg:text-4xl sx:text-4xl font-[400] 2xl:mt-20 sx:mt-24 2xl:mb-20">Гонки</h2>
        {{--        flex gap-x-7 gap-y-5--}}
        <div
            class="grid 2xl:grid-cols-6 2xl:gap-x-3.5 2xl:gap-y-3.5 sx:grid-cols-2 sx:gap-x-3.5 sx:gap-y-3.5 lg:grid-cols-4 md:grid-cols-3 xl:grid-cols-5 mb-10 mt-10">
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('inst.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="">
                <div class="image-container flex justify-center items-center py-3 rounded-t-2xl">
                    <img src="{{ asset('tel.png') }}" alt="Image 1" class="max-w-24">
                    <div class="average-color-overlay"></div>
                </div>
                <div class="bg-white px-3.5 pb-2 rounded-b-2xl">
                    <div class="font-semibold text-base pt-2">Instagram</div>
                    <div class="flex justify-between pt-5 items-center">
                        <div class="text-[#828282] text-[0.875rem] flex items-center gap-x-0.5 pr-9">
                            4.1
                            <img src="{{ asset('assets/images/star.svg') }}" alt="">
                        </div>
                        <div>
                            <button type="submit" class="text-white text-xs bg-[#298DFF] px-4 rounded-2xl py-0.5">
                                скачать
                            </button>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <script src="{{ asset('assets/js/image.js') }}"></script>
@endsection
