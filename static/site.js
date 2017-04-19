jQuery(document).ready(function($) {
    $('#viewGallery').on('click touchstart', function(event) {
        event.preventDefault();
        $('.section--image-grid').toggleClass('viewingMore');
    });
});
