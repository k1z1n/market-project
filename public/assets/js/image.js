let imageContainers = document.querySelectorAll('.image-container');
imageContainers.forEach(function(container) {
    let img = container.querySelector('img');

    // Загружаем изображение
    img.onload = function() {
        let canvas = document.createElement('canvas');
        let ctx = canvas.getContext('2d');
        canvas.width = img.naturalWidth;
        canvas.height = img.naturalHeight;
        ctx.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight);

        let imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        let data = imageData.data;

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

        container.style.backgroundImage = `radial-gradient(circle, rgba(${r},${g},${b},0) -50%, rgba(${r},${g},${b},1) 100%)`;
    };

    img.src = img.getAttribute('src');
});
