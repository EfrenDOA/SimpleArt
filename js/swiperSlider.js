
let pswiper = new Swiper('.blogs', {
    slidesPerView : 4,
    spaceBetween: 30,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    loop: true,
    loopFillGroupWithBlank: true,
    navigation: {
        nextEl: '.fa-angle-right',
        prevEl: '.fa-angle-left',
    },

    breakpoints:{
        0: {
            slidesPerView: 1,
        },
        520: {
            slidesPerView: 2,
        },
        950: {
            slidesPerView: 3,
        },
        1100: {
            slidesPerView: 4,
        }
    }

});