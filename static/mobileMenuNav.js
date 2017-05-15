jQuery(document).ready(function($) {
    checkSize();

    function checkSize() {
        $prev = $('#previousButton');
        $next = $('#nextButton');
        if ($(".hidden--mob").css("display") == "none") {
            $('.mobile--menu').slick({
                asNavFor: '.mobile--menu-navigation-track',
                arrows: false,
                cssEase: 'ease-in-out',
                dots: false,
                fade: true,
                focusOnSelect: false,
                infinite: false,
                mobileFirst: true,
                slidesToScroll: 1,
                slidesToShow: 1,
                speed: 200,
                swipe: false,
                adaptiveHeight: true
            });
            $('.mobile--menu-navigation-track').slick({
                asNavFor: '.mobile--menu',
                arrows: true,
                centerMode: true,
                cssEase: 'ease',
                dots: false,
                focusOnSelect: true,
                infinite: false,
                mobileFirst: true,
                slidesToScroll: 1,
                slidesToShow: 1,
                swipe: true,
                swipeToSlide: true,
                speed: 200,
                prevArrow: $prev,
                nextArrow: $next
            });
            $('.mobile--slider').slick({
                arrows: false,
                dots: true,
                focusOnSelect: false,
                infinite: true,
                cssEase: 'ease-in-out',
                speed: 600,
                mobileFirst: true,
                slidesToScroll: 1,
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                adaptiveHeight: true
            });
        }
    }
});