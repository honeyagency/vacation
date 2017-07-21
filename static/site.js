jQuery(document).ready(function($) {
    $('#viewGallery').on('click touchstart', function(event) {
        event.preventDefault();
        $text = $('#viewGallery > span');
        if ($text.text() == 'View More') {
            $text.text('View Less');
        } else {
            $text.text('View More');
        }
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
    // $prev = $('#backOne');
    // $next = $('#forwardOne');
    $('.menu-border').slick({
        arrows: false,
        cssEase: 'ease-in-out',
        dots: true,
        fade: true,
        focusOnSelect: false,
        infinite: false,
        mobileFirst: true,
        slidesToScroll: 1,
        slidesToShow: 1,
        speed: 200,
        swipe: true,
        adaptiveHeight: true,
        // prevArrow: $prev,
        // nextArrow: $next
    });
});
// Scroll so nice you'll click() it twice
jQuery(document).ready(function() {
    jQuery('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = jQuery(this.hash);
            target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                if ($('body').hasClass('open')) {
                    $('body').removeClass('open');
                }
                jQuery('html, body').animate({
                    scrollTop: target.offset().top
                }, 300, "swing");
                return false;
            }
        }
    });
});