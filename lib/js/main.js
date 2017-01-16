// Loader
(function() {
    $(document).ready(function() {
        $(document).imagesLoaded(function() {
            // Page loader
            jQuery(".page-loader .loader").delay(800).fadeOut();
            jQuery(".page-loader").delay(1200).fadeOut(600);
        });
    });
})();

//date
(function(){
    var dateholder = $('.tb-date');
    var date = new Date();
    dateholder.html("<i class=\"li_calendar\"></i> "+ date.toString("dddd, MMMM dd, yyyy"));
})();

// Popups
(function(){
    var popups = $('.js-popups');

    popups.magnificPopup({
        type:'inline',
        midClick: true,
        fixedContentPos: false,
        closeMarkup: '<span class="popup-close-ic mfp-close"></span>',
        removalDelay: 300,
        mainClass: 'mfp-fade-top'
    });
})();

// Mobile menu
(function(){
    var mbMenu = $('.js-mb-menu');

    mbMenu.magnificPopup({
        mainClass: 'mfp-mb-menu mfp-fade',
        type:'inline',
        midClick: true,
        fixedContentPos: false,
        closeMarkup: '<span class="mb-menu-close-ic mfp-close"></span>',
        removalDelay: 300
    });
})();

// Left sticky bar
(function() {
    $(window).load(function() {
        var inner = $('.inner-wrapper');
        var leftStBar = $('.js-lsb');

        var waypoints = inner.waypoint({
            handler: function(dir) {
                if (dir === 'down') {
                    leftStBar.addClass('sticky');
                } else if (dir === 'up') {
                    leftStBar.removeClass('sticky');
                }
            }
        });
    });
})();

// Sticky header
(function(){
    var stHeader = $('.js-sticky-header');
    var content = $('.main-content');

    content.waypoint(function(direction) {
        if(direction==="down") {
            stHeader.addClass('visible');
        } else if(direction==="up") {
            stHeader.removeClass('visible');
        }
    });
})();

// Aside menu
(function(){
    var mbMenu = $('.js-asd-menu');

    mbMenu.magnificPopup({
        mainClass: 'mfp-asd-menu mfp-slide-left',
        type:'inline',
        midClick: true,
        closeMarkup: '<span class="aside-menu-close-ic mfp-close"></span>',
        removalDelay: 300
    });
})();

// Super fish menu
(function(){
    $(document).ready(function() {
        $('ul.sf-menu').superfish({
            delay: 300
        });
    });
})();

// Search block variant 1
(function(){
    var searchBtn = $('.js-hd-search');
    var searchBlock = $('.js-hd-search-block');

    searchBtn.on('click', function(e) {
        var el = $(this);
        var searchBlock = el.parent().find('.js-hd-search-block');

        e.preventDefault();
        searchBlock.fadeToggle(200);
    });

    $(document).on("click", function(event) {
        if( $(event.target).closest(searchBlock).length == 0 && $(event.target).closest(searchBtn).length == 0 ) {
            searchBlock.fadeOut(200);
        }
    });
})();

// // Search block variant 2
// (function(){
//     var searchBtn = $('.js-hd-search');

//     searchBtn.magnificPopup({
//         type:'inline',
//         midClick: true,
//         fixedContentPos: false
//     });
// })();


// Trending line slider
(function() {
    $(document).ready(function() {
        var slider = $('.tl-slider');

        slider.slick({
            fade: true,
            speed: 800,
            autoplay: true,
            appendArrows: $('.tl-slider-control'),
            prevArrow: '<span class="arr-left-dark-ic tls-prev"><i></i></span>',
            nextArrow: '<span class="arr-right-dark-ic tls-next"><i></i></span>'
        });
    });
})();

// Trending posts slider
(function() {
    $(document).ready(function() {
        var slider = $('.js-trend-pst-slider');
        var pagg;

        slider.each(function() {
            var el = $(this);
            pagg = el.parents('.trpst-block').find('.js-sbr-pagination');

            el.slick({
                fade: true,
                speed: 1000,
                dots: true,
                arrows: false,
                appendDots: pagg,
                dotsClass: 'sbr-dots',
                customPaging : function(slider, i) {
                    return '<span></span>';
                }
            });
        });
    });
})();

// Filters dropdown
(function(){
    var filterBtn = $('.js-fl-btn');

    filterBtn.each(function() {
        var el = $(this);
        var filterBlock = el.find('.js-fl-block');

        el.on('click', function(e) {
            e.preventDefault();
            filterBlock.fadeToggle(200);
        });

        $(document).on("click", function(event) {
            if( $(event.target).closest(filterBlock).length == 0 && $(event.target).closest(el).length == 0 ) {
                filterBlock.fadeOut(200);
            }
        });
    });
})();

// Main slider 1
(function() {
    $(document).ready(function() {
        var swiper = new Swiper('.js-main-slider-1', {
            // Optional parameters
            speed: 1000,
            loop: true,

            nextButton: '.nav-arrow.next',
            prevButton: '.nav-arrow.prev',
            pagination: '.slide-count',
            paginationType: 'fraction',
            paginationFractionRender: function(swiper, currentClassName, totalClassName) {
                return '<span class="' + currentClassName + '"></span>' +
                    ' of ' +
                    '<span class="' + totalClassName + '"></span>';
            }

        });
    });
})();

// Main slider 2
(function() {
    $(document).ready(function() {
        var mainSlider = $('.js-main-slider-2');
        var slideCount = $('.slide-count');
        var slideNumCurrent = slideCount.find('.current');
        var slideNumTotal = slideCount.find('.total');

        mainSlider.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
            var i = (currentSlide ? currentSlide : 0) + 1;
            slideNumCurrent.text(i);
            slideNumTotal.text(slick.slideCount);
        });

        mainSlider.slick({
            speed: 600,
            appendArrows: $('.ms-navs'),
            prevArrow: '<div class="prev"><i class="ms-prev"></div>',
            nextArrow: '<div class="next"><i class="ms-next"></div>',
        });
    });
})();

// Main slider 3
(function() {
    $(document).ready(function() {
        var mainSlider = $('.js-main-slider-3');
        var slideCount = $('.slide-count');
        var slideNumCurrent = slideCount.find('.current');
        var slideNumTotal = slideCount.find('.total');

        mainSlider.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
            var i = (currentSlide ? currentSlide : 0) + 1;
            slideNumCurrent.text(i);
            slideNumTotal.text(slick.slideCount);
        });

        mainSlider.slick({
            fade: true,
            speed: 1000,
            appendArrows: $('.ms-navs'),
            prevArrow: '<div class="prev"><i class="ms-prev"></div>',
            nextArrow: '<div class="next"><i class="ms-next"></div>',
        });
    });
})();

// Thumbs slider
(function() {
    $(document).ready(function() {
        var thumbs = $('.js-thumbs').find('.js-thumbs-img');

        var slider = new Swiper('.js-thumbs-slider', {
            noSwiping: false
        });

        thumbs.on('click', function(e) {
            var el = $(this);
            var i = el.index();

            slider.slideTo(i, 1000);
        });
    });
})();

// Simple posts slider
(function() {
    $(document).ready(function() {
        var slider = $('.js-pst-block');
        var controls;
        var prev;
        var next;

        slider.each(function() {
            var el = $(this);
            controls = el.parents('.spst-slider').find('.js-pst-navs');
            prev = controls.find('.pst-prev');
            next = controls.find('.pst-next');

            el.owlCarousel({
                items: el.data('items') ? el.data('items') : 3,
                slideSpeed: 1000,
                pagination: false,
                addClassActive: true,
                itemsDesktop: el.data('items') ? [1229,el.data('items')] : [1229,3],
                itemsDesktopSmall: el.data('items') === 1 ? 1 : [1077,2],
                itemsTablet: el.data('items') === 1 ? 1 : [767,2],
                itemsTabletSmall: [639,1],
                // itemsMobile: [479,1]
            });

            // Custom Navigation Events
            next.click(function(e) {
                e.preventDefault();
                el.trigger('owl.next');
            });
            prev.click(function(e) {
                e.preventDefault();
                el.trigger('owl.prev');
            });
        });
    });
})();

// Simple posts slider two
(function() {
    $(document).ready(function() {
        var slider = $('.js-pst-block-2');
        var slides = slider.data('slides');
        var controls;
        var prev;
        var next;

        slider.each(function() {
            var el = $(this);
            controls = el.parents('.pst-box').find('.js-pst-navs');

            el.slick({
                slidesToShow: slides ? slides : 3,
                appendArrows: controls,
                prevArrow: '<span><i class="fa fa-angle-left"></i></span>',
                nextArrow: '<span><i class="fa fa-angle-right"></i></span>',
                responsive: [{
                    breakpoint: 1229,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                }, {
                    breakpoint: 1077,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }, {
                    breakpoint: 639,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            });
        });
    });
})();

// Simple posts slider with custom pagination
(function() {
    $(document).ready(function() {
        var slider = $('.js-csp-block');
        var pagg;

        slider.each(function() {
            var el = $(this);
            pagg = el.parents('.pst-block').find('.js-sbr-pagination');

            el.slick({
                fade: true,
                speed: 1000,
                dots: true,
                arrows: false,
                appendDots: pagg,
                dotsClass: 'sbr-dots',
                customPaging : function(slider, i) {
                    return '<span></span>';
                }
            });
        });
    });
})();

// Image post slider
(function() {
    $(document).ready(function() {
        var mainSlider = $('.js-img-slider');
        var customNavs = mainSlider.parent('.img-slider').find('.js-custom-navs');
        var slideCount = customNavs.find('.js-slide-count');
        var slideNumCurrent = slideCount.find('.js-current');
        var slideNumTotal = slideCount.find('.js-total');

        mainSlider.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
            var i = (currentSlide ? currentSlide : 0) + 1;
            slideNumCurrent.text(i);
            slideNumTotal.text(slick.slideCount);
        });

        mainSlider.slick({
            speed: 600,
            appendArrows: customNavs,
            prevArrow: '<div class="prev"><i class="fa fa-angle-left"></div>',
            nextArrow: '<div class="next"><i class="fa fa-angle-right"></div>'
        });
    });
})();

// Sidebar slider
(function() {
    $(document).ready(function() {
        var slider = $('.js-sbr-slider');
        var pagg;
        var nav;
        var prev;
        var next;

        slider.each(function() {
            var el = $(this);
            pagg = el.parents('.sbr-slider').find('.js-sbr-pagination');
            nav = el.parents('.sbr-slider').find('.js-sbr-navs');
            prev = nav.find('.sbr-prev');
            next = nav.find('.sbr-next');

            el.slick({
                fade: true,
                speed: 1000,
                dots: true,
                appendDots: pagg,
                appendArrows: nav,
                prevArrow: '<div class="prev"><i class="sbr-prev"></div>',
                nextArrow: '<div class="next"><i class="sbr-next"></div>',
                dotsClass: 'sbr-dots',
                customPaging : function(slider, i) {
                    return '<span></span>';
                }
            });
        });
    });
})();

// Sidebar sticky
(function(){
    var stickSb = $(".js-sidebar");

     $(document).ready(function() {
        $(document).imagesLoaded(function() {
            stickSb.each(function () {
                var el = $(this);

                el.stick_in_parent({
                    parent: '.section',
                    offset_top: $('.js-sticky-header') ? 65 : 0
                });
            });
        });
    });
})();

// Go top button
(function(){
    var butt = $('.js-go-top');
    butt.on('click', function(e) {
        e.preventDefault();
        var body = $("html, body");
        body.animate({
            scrollTop: 0
        }, 1500);
    });

    $('.main-content').waypoint(function(direction) {
        if(direction==="down") {
            butt.removeClass('fadeOutUp')
                .addClass('fadeInUp');
        } else if(direction==="up") {
            butt.removeClass('fadeInUp')
                .addClass('fadeOutUp');
        }
    });
})();


// Accordions
(function() {

    var allPanels = $('.accordion > dd').hide();

    $('.accordion > dt > a').on('click', function(e) {
        e.preventDefault();

        var el = $(this);
        if(!el.hasClass('open')) {
            allPanels.slideUp().prev().removeClass('open').children().removeClass('open');
            $(this).addClass('open').parent().addClass('open').next().slideDown();
        }
    });

})();

// Tabs
(function() {
    $(".tab-item").not(":first").hide();
    $(".tabs-list .tab").on('click', function() {
        var el = $(this);
        if(!el.hasClass('active')) {
            $(".tabs .tab").removeClass("active").eq(el.index()).addClass("active");
            $(".tab-item").hide().eq(el.index()).fadeIn();
        }
    }).eq(0).addClass("active");
})();

