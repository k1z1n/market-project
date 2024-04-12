@extends('includes.template')
@section('title', 'main')
@section('content')
    <div class="glide">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <li class="glide__slide">
                    <img src="{{asset('img.png')}}" alt="Image 1">
                </li>
                <li class="glide__slide glide__slide--center">
                    <img src="{{asset('img.png')}}" alt="Image 2">
                </li>
                <li class="glide__slide">
                    <img src="{{asset('img.png')}}" alt="Image 3">
                </li>
            </ul>
        </div>
        <div class="glide__bullets" data-glide-el="controls[nav]"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script>
        var glide = new Glide('.glide', {
            type: 'carousel',
            startAt: 1,
            perView: 3,
            focusAt: 'center',
            animationDuration: 1000,
            animationTimingFunc: 'cubic-bezier(0.165, 0.840, 0.440, 1.000)',
            peek: {
                before: 0,
                after: 2
            }
        });

        glide.mount();

        // Dynamically generate bullets
        var dots = document.querySelector('.glide__bullets');
        for (var i = 0; i < glide.settings.peek.before + 1 + glide.settings.peek.after; i++) {
            var dot = document.createElement('button');
            dot.className = 'glide__bullet';
            dot.setAttribute('data-glide-dir', '=' + i);
            dots.appendChild(dot);
        }

        // Add active class to the first dot
        dots.children[0].classList.add('glide__bullet--active');

        // Update active dot on change
        glide.on('run', function() {
            dots.querySelector('.glide__bullet--active').classList.remove('glide__bullet--active');
            dots.children[glide.index].classList.add('glide__bullet--active');
        });
    </script>
@endsection
