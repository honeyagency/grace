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
    var $fixSpot = $('.section--header').next().offset().top - 10;
    var $theWin = $(document).scrollTop();
    var $theBod = $('body');
    var $datNav = $('.section--fix');
    if ($fixSpot <= $theWin) {
        $datNav.addClass('fix');
        $theBod.addClass('fix');
    } else {
        $datNav.removeClass('fix');
        $theBod.removeClass('fix');
    }
}

function toTop(e) {
    var body = document.body,
        html = document.documentElement;
    var height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
    var $toTop = $('.to-top');
    var $theWin = $(document).scrollTop();
    if (height > 6000) {
        if ($theWin > 3000) {
            $toTop.addClass('showit');
        } else {
            $toTop.removeClass('showit');
        }
    }
}
var toTopDebounce = debounce(function(e) {
    toTop(e);
}, 250);
var stickyNavDebounce = debounce(function(e) {
    stickyNav(e);
}, 15);
if ($(window).width() > 768) {
    window.addEventListener('scroll', stickyNavDebounce);
} else {
    console.log('fish');
}
window.addEventListener('scroll', toTopDebounce);
jQuery(document).ready(function(e) {
    stickyNav(e);
    toTop(e);
});
jQuery(function() {
  jQuery('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        jQuery('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});