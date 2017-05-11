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
                swipe: false
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
                speed: 300,

                prevArrow: $prev,
                nextArrow: $next
            });
        }
    }
});