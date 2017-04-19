function debounce(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this,
            args = arguments;
        var later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
};

function stickyNav(e) {
    var $theWin = $(document).scrollTop();
    $('.has--nav[data-nav]').filter(function() {
        $navArray = $(this);
        var nav = $('nav');
        var nav_height = nav.height();
        $navArray.each(function() {
            var top = $(this).offset().top - nav_height,
                bottom = top + $(this).outerHeight();
            if ($theWin >= top && $theWin <= bottom) {
                nav.find('a').removeClass('current');
                $navArray.removeClass('current');
                $(this).addClass('current');
                nav.find('li.' + $(this).data('nav') + '> a').addClass('current');
            }
        });
    });
}
var stickyNavDebounce = debounce(function(e) {
    stickyNav(e);
}, 30);
window.addEventListener('scroll', stickyNavDebounce);
jQuery(document).ready(function(e) {
    stickyNav(e);
});