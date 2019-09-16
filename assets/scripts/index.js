import mentores from "./objects.js";
$(() => {
    $('.banners-control li').bind('click', (event) => {
        const $anchor = $(this).attr('href');

        $('.banners-control').stop().animate({
            scrollLeft: $($anchor).offset().left
        }, 1000);
        event.preventDefault();
    });
});