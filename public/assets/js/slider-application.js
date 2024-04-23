let glide = new Glide('.glide', {
    type: 'carousel',
    startAt: 1,
    perView: 3,
    rewind: false,
    animationDuration: 700,
    peek: {
        before: 0,
        after: 2
    },
    breakpoints: {
        768: {
            perView: 1
        },
        1024: {
            perView: 2
        }
    },
});
glide.mount();
