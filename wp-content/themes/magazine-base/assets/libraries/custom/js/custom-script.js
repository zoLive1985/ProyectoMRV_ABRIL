(function (e) {
    "use strict";
    var n = window.Thememattic_JS || {};
    n.stickyMenu = function () {
        if (e(window).scrollTop() > 350) {
            e("#masthead").addClass("nav-affix");
        } else {
            e("#masthead").removeClass("nav-affix");
        }
    };
    n.mobileMenu = {
        init: function () {
            this.toggleMenu();
            this.menuMobile();
            this.menuArrow();
        },
        toggleMenu: function () {
            e('#masthead').on('click', '.toggle-menu', function (event) {
                var ethis = e('.main-navigation .menu .menu-mobile');
                if (ethis.css('display') == 'block') {
                    ethis.slideUp('300');
                } else {
                    ethis.slideDown('300');
                }
                e('.ham').toggleClass('exit');
            });
            e('#masthead .main-navigation ').on('click', '.menu-mobile a i', function (event) {
                event.preventDefault();
                var ethis = e(this),
                    eparent = ethis.closest('li'),
                    esub_menu = eparent.find('> .sub-menu');
                if (esub_menu.css('display') == 'none') {
                    esub_menu.slideDown('300');
                    ethis.addClass('active');
                } else {
                    esub_menu.slideUp('300');
                    ethis.removeClass('active');
                }
                return false;
            });
        },
        menuMobile: function () {
            if (e('.main-navigation .menu > ul').length) {
                var ethis = e('.main-navigation .menu > ul'),
                    eparent = ethis.closest('.main-navigation'),
                    pointbreak = eparent.data('epointbreak'),
                    window_width = window.innerWidth;
                if (typeof pointbreak == 'undefined') {
                    pointbreak = 991;
                }
                if (pointbreak >= window_width) {
                    ethis.addClass('menu-mobile').removeClass('menu-desktop');
                    e('.main-navigation .toggle-menu').css('display', 'block');
                } else {
                    ethis.addClass('menu-desktop').removeClass('menu-mobile').css('display', '');
                    e('.main-navigation .toggle-menu').css('display', '');
                }
            }
        },
        menuArrow: function () {
            if (e('#masthead .main-navigation div.menu > ul').length) {
                e('#masthead .main-navigation div.menu > ul .sub-menu').parent('li').find('> a').append('<i class="ion-ios-arrow-down">');
            }
        }
    };
    n.ThemematticWidgetsNav = function () {

        if (e("body").hasClass("rtl")) {
            e('.trending-news').sidr({
                name: 'sidr-nav',
                side: 'right'
            });
        } else {
            e('.trending-news').sidr({
                name: 'sidr-nav',
                side: 'left'
            });
        }

        e('.trending-news').click(function(){
            e('.sidr-class-sidr-button-close').focus();
        });

        e( '.tmt-canvas-focus' ).on( 'focus', function() {
            e('.sidr-class-sidr-button-close').focus();
        } );

        e('.sidr-class-sidr-button-close').click(function () {
            e.sidr('close', 'sidr-nav');
            e('.search-field').focus();
        });

        e(document).keyup(function(j) {
            if (j.key === "Escape") { // escape key maps to keycode `27`
                e.sidr('close', 'sidr-nav');
                e('.search-field').focus();
            }
        });

    };
    n.thememattic_matchheight = function () {
        e('.widget-area').theiaStickySidebar({
            additionalMarginTop: 30
        });
    };
    n.DataBackground = function () {
        var pageSection = e(".data-bg");
        pageSection.each(function (indx) {
            if (e(this).attr("data-background")) {
                e(this).css("background-image", "url(" + e(this).data("background") + ")");
            }
        });
        e('.bg-image').each(function () {
            var src = e(this).children('img').attr('src');
            e(this).css('background-image', 'url(' + src + ')').children('img').hide();
        });
    };
    n.SlickCarousel = function () {
        e(".mainbanner-jumbotron").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            autoplay: true,
            autoplaySpeed: 8000,
            infinite: true,
            dots: false,
            nextArrow: '<i class="Thememattic-icon slide-icon slide-next ion-ios-arrow-right quaternary-bgcolor"></i>',
            prevArrow: '<i class="Thememattic-icon slide-icon slide-prev ion-ios-arrow-left quaternary-bgcolor"></i>',
        });
        e(".tm-slider-widget").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            autoplay: true,
            autoplaySpeed: 8000,
            infinite: true,
            dots: false,
            nextArrow: '<i class="Thememattic-icon slide-icon slide-next ion-ios-arrow-right quaternary-bgcolor"></i>',
            prevArrow: '<i class="Thememattic-icon slide-icon slide-prev ion-ios-arrow-left quaternary-bgcolor"></i>',
        });
        e('.trending-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            arrows: false,
            nextArrow: '<i class="Thememattic-icon slide-icon slide-next ion-ios-arrow-right quaternary-bgcolor"></i>',
            prevArrow: '<i class="Thememattic-icon slide-icon slide-prev ion-ios-arrow-left quaternary-bgcolor"></i>',
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        arrows: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        arrows: true
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true
                    }
                }
            ]
        });
        e(".gallery-columns-1, ul.wp-block-gallery.columns-1, .wp-block-gallery.columns-1 .blocks-gallery-grid").each(function () {
            e(this).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                autoplay: true,
                autoplaySpeed: 8000,
                infinite: true,
                dots: false,
                nextArrow: '<i class="Thememattic-icon slide-icon slide-next ion-ios-arrow-right quaternary-bgcolor"></i>',
                prevArrow: '<i class="Thememattic-icon slide-icon slide-prev ion-ios-arrow-left quaternary-bgcolor"></i>',
            });
        });
    };
    n.ImagePopup = function () {
        e('.widget .gallery, .entry-content .gallery, .wp-block-gallery').each(function () {
            e(this).magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: true,
                    duration: 300,
                    opener: function (element) {
                        return element.find('img');
                    }
                }
            });
        });
    };
    n.ThemematticMarquee = function () {
        e('.marquee').marquee({
            direction: 'left',
            speed: 1500,
            pauseOnHover: true
        });
    };
    n.Thememattic_preloader = function () {
       
            e("body").addClass("page-loaded");
      
    };
    n.InnerBanner = function () {
        var pageSection = e(".data-bg");
        pageSection.each(function (indx) {
            if (e(this).attr("data-background")) {
                e(this).css("background-image", "url(" + e(this).data("background") + ")");
            }
        });
    };
    // SHOW/HIDE SCROLL UP //
    n.show_hide_scroll_top = function () {
        if (e(window).scrollTop() > e(window).height() / 2) {
            e("#scroll-up").fadeIn(300);
        } else {
            e("#scroll-up").fadeOut(300);
        }
    };
    // SCROLL UP //
    n.scroll_up = function () {
        e("#scroll-up").on("click", function () {
            e("html, body").animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    };
	
        e(window).load(function () {
           n.Thememattic_preloader();
        });
		
    e(document).ready(function () {
        n.mobileMenu.init();
        n.ThemematticWidgetsNav();
        n.DataBackground();
        n.SlickCarousel();
        n.ImagePopup();
        n.thememattic_matchheight();
        n.scroll_up();
    });
    e(window).scroll(function () {
        n.stickyMenu();
        n.show_hide_scroll_top();
    });
    e(window).resize(function () {
        n.mobileMenu.menuMobile();
    });
})(jQuery);
