

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
