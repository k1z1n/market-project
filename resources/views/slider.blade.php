<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Average Color Gradient</title>
    <style>
        .image-container {
            width: 100%;
            height: 300px;
            position: relative;
            overflow: hidden;
            background-size: cover;
            background-position: center;
        }
        .image-container img {
            width: 50%;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); /* Adjusted to center the image */
            display: block;
        }
        .average-color-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .con{
            display: flex;
            justify-content: space-between;
            gap: 100px;
        }
    </style>
</head>
<body>
<div class="con">
    <div class="image-container">
        <img src="inst.png" alt="Image 1">
        <div class="average-color-overlay"></div>
    </div>
    <div class="image-container">
        <img src="tel.png" alt="Image 2">
        <div class="average-color-overlay"></div>
    </div>
    <div class="image-container">
        <img src="img.png" alt="Image 3">
        <div class="average-color-overlay"></div>
    </div>
    <div class="image-container">
        <img src="image.png" alt="Image 4">
        <div class="average-color-overlay"></div>
    </div>
</div>

<script>
    // Получаем все контейнеры с изображениями
    let imageContainers = document.querySelectorAll('.image-container');

    // Обрабатываем каждый контейнер
    imageContainers.forEach(function(container) {
        // Получаем изображение внутри контейнера
        let img = container.querySelector('img');

        // Загружаем изображение
        img.onload = function() {
            // Создаем canvas и рисуем изображение на нем
            let canvas = document.createElement('canvas');
            let ctx = canvas.getContext('2d');
            canvas.width = img.naturalWidth;
            canvas.height = img.naturalHeight;
            ctx.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight);

            // Получаем данные изображения
            let imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
            let data = imageData.data;

            // Вычисляем средний цвет
            let r = 0, g = 0, b = 0;
            for (let i = 0; i < data.length; i += 4) {
                r += data[i];
                g += data[i + 1];
                b += data[i + 2];
            }
            let count = data.length / 4;
            r = Math.floor(r / count);
            g = Math.floor(g / count);
            b = Math.floor(b / count);

            // Устанавливаем градиент среднего цвета в качестве фона
            container.style.backgroundImage = `radial-gradient(circle, rgba(${r},${g},${b},0) -50%, rgba(${r},${g},${b},1) 100%)`;
        };

        // Устанавливаем источник изображения
        img.src = img.getAttribute('src');
    });
</script>

</body>
</html>
