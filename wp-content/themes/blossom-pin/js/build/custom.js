jQuery(document).ready(function($) {

    if (blossom_pin_data.rtl == '1') {
        rtl = true;
    } else {
        rtl = false;
    }

    //banner slider
    $('.banner-slider').owlCarousel({
        loop: true,
        autoplay: true,
        margin: 8,
        nav: true,
        dots: false,
        lazyload: true,
        rtl: rtl,
        navText: ['<svg xmlns="http://www.w3.org/2000/svg" viewBox="-19991 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-20326.6 -12200.8)"/></svg> ', ' <svg xmlns="http://www.w3.org/2000/svg" viewBox="-18147 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-17793.4 -11413.2) rotate(180)"/></svg> '],
        responsive: {
            0: {
                items: 1,
                margin: 0
            },
            600: {
                items: 2
            },
            768: {
                items: 3
            },
            1200: {
                items: 4
            },
            1400: {
                items: 5
            }
        },
    });

    //Home Page Masonry
    var $this = $('.blog:not(.no-post) #primary .site-main');
    $this.imagesLoaded(function() {
        $this.masonry({
            itemSelector: '.blog #primary .post'
        });
    });

    // Search Form
    var winWidth;
    var headerHeight;
    //position search close from top
    $(window).on('load resize', function() {
        winWidth = $(window).width();
        headerHeight = $('.site-header').outerHeight();
        $('.site-header .tools .search-icon').on( 'click', function () {
            $('.search-form-holder').css('top', headerHeight);
            // $('body').toggleClass('form-open');
        });

        // search form for mobile version
        $('.mobile-site-header .tools .search-icon').on( 'click', function () {
            var mobileHeaderHeight = $('.mobile-site-header').outerHeight();
            $('.search-form-holder').css('top', mobileHeaderHeight);
            // $('body').toggleClass('form-open');
        });
        $('.tools .header-search .search-toggle').each(function() {
            var SearchTogglePosTop = $(this).offset().top;
            // console.log(SearchTogglePosTop);
            var SearchTogglePosLeft = $(this).offset().left;
            // console.log(SearchTogglePosLeft);

            $('.tools .search-form-holder .search-icon').css({ 'top': SearchTogglePosTop, 'left': SearchTogglePosLeft });
        });
    });

    //for single post scrolling header
    if (winWidth > 1024) {
        $(window).scroll(function() {
            if ($(this).scrollTop() > headerHeight) {
                $('.single .single-header').addClass("show");
            } else {
                $('.single .single-header').removeClass("show");
            }
        });
    }
    if (blossom_pin_data.single == '1') {
        // When the user scrolls the page, execute myFunction 
        var totalheight = $('.recommended-post').innerHeight() + $('.comment-section').innerHeight() + $('.instagram-section').innerHeight() + $('.newsletter-section').innerHeight() + $('.site-footer').innerHeight();

        window.onscroll = function() { 
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight - parseInt(totalheight);
            var scrolled = (winScroll / height) * 100;

            document.getElementById("myBar").style.width = scrolled + "%"; 
        };
    }

    //primary mobile menu
    // $('.mobile-menu').prepend('<button class="btn-close-menu"><span></span></button>');
    $('#mobile-site-navigation ul li.menu-item-has-children').find('> a').after('<button class="arrow-holder"><span class="fas fa-angle-down"></span></button>');
    $('#mobile-site-navigation ul li .arrow-holder').on( 'click', function() {
        $(this).next().slideToggle();
        $(this).toggleClass('active');
    });

    $('#toggle-button').on( 'click', function() {
        $('.mobile-menu-wrap').animate({
            width: 'toggle',
        });
    });

    $('.btn-close-menu').on( 'click', function() {
        $('.mobile-menu-wrap').animate({
            width: 'toggle',
        });
    });

    $('.mobile-menu-wrap .social-networks').insertAfter('.mobile-menu-wrap .mobile-menu .main-menu-modal > li:last-child');

    //for accessibility
    $('.main-navigation ul li a, .main-navigation ul li button').on( 'focus', function() {
        $(this).parents('li').addClass('focused');
    }).on( 'blur', function() {
        $(this).parents('li').removeClass('focused');
    });

    // Script for back to top
    $(window).on( 'scroll', function(){
        if($(this).scrollTop() > 300){
          $('.back-to-top').fadeIn();
        }else{
          $('.back-to-top').fadeOut();
        }
    });

    $(".back-to-top").on( 'click', function(){
        $('html,body').animate({scrollTop:0},600);
    });

    // $(".insta-icon").prependTo(".profile-link");
});
