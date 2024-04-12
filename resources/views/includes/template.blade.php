<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.theme.min.css">
    <style>
        .glide__slide {
            width: 100%;
            opacity: 0.5;
            transform: scale(0.85);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .glide__slide img{
            border-radius: 20px;
        }
        .glide__slide--active {
            opacity: 1;
            transform: scale(1);
        }
        .glide__slide--active.glide__slide--center {
            opacity: 1;
            transform: scale(1);
        }
        .glide__slide img {
            width: 100%;
            height: auto;
        }
        .glide__arrow {
            position: absolute;
            top: 50%;
            z-index: 2;
            display: block;
            width: 26px;
            height: 26px;
            padding: 0;
            cursor: pointer;
            opacity: 0.6;
            transform: translateY(-50%);
            transition: opacity 0.3s ease;
        }
        .glide__arrow:hover {
            opacity: 1;
        }
        .glide--prev {
            left: 20px;
        }
        .glide--next {
            right: 20px;
        }
        .glide__bullets {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            list-style: none;
            padding: 0;
        }
        .glide__bullet {
            background-color: rgba(255, 255, 255, 0.5);
            width: 10px;
            height: 10px;
            padding: 0;
            border-radius: 50%;
            border: 2px solid transparent;
            transition: all 300ms ease-in-out;
            cursor: pointer;
            line-height: 0;
            box-shadow: 0 0.25em 0.5em 0 rgba(0, 0, 0, 0.1);
            margin: 0 0.25em;
        }
        .glide__bullet:focus {
            outline: none;
        }
        .glide__bullet:hover,
        .glide__bullet:focus {
            border: 2px solid white;
            background-color: rgba(255, 255, 255, 0.75);
        }
        .glide__bullet--active {
            background-color: white;
        }
    </style>
    <title>@yield('title', config('app.name'))</title>
</head>
<body>
@include('includes.header')
@yield('content')
@include('includes.footer')
</body>
</html>
