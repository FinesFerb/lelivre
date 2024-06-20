// Главный слайдер
var slider = new Swiper(".mySwiper", {
    autoplay:{
        delay:5000,
    },
    loop:{
        loop:true,
    },
    spaceBetween: 30,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
    },
    mousewheel: true,
    // keyboard: true,
});


// Слайдер книжной полки
var swiper = new Swiper('.swiper-container', {
    slidesPerView: 'auto', // Автоматическое количество отображаемых слайдов
    spaceBetween: 30, // Расстояние между слайдами
    navigation: {
        nextEl: ".discont_swiper_next",
        prevEl: ".discont_swiper_prev"
    },
    grabCursor: true, // Изменение курсора при наведении
});
