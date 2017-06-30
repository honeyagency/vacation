jQuery(document).ready(function($) {
    $('#viewGallery').on('click touchstart', function(event) {
        event.preventDefault();
        $('.section--image-grid').toggleClass('viewingMore');
    });
    $('.takemeaway').on('click touchstart', function(event) {
        event.preventDefault();
        $('.section--home-video').toggleClass('open');
        $('.section--home-video video').get(0).play();
    });
    $('#navToggle').on('click touchstart', function(event) {
        event.preventDefault();
        $('body').toggleClass('open');
    });
    $('.target--email').on('click touchstart', function(event) {
        event.preventDefault();
        $('.section--email-signup').toggleClass('toggled');
    });
});
jQuery(document).ready(function($) {
    $prev = $('#backOne');
    $next = $('#forwardOne');
    $('.menu-border').slick({
        arrows: true,
        cssEase: 'ease-in-out',
        dots: false,
        fade: true,
        focusOnSelect: false,
        infinite: false,
        mobileFirst: true,
        slidesToScroll: 1,
        slidesToShow: 1,
        speed: 200,
        swipe: true,
        adaptiveHeight: true,
        prevArrow: $prev,
        nextArrow: $next
    });
});