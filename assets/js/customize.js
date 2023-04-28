jQuery(function($) {
    $(document).ready(function(){
        new WOW().init();
        init_home_top_slider();
        humburger_menu();
        horisontal_scroll_by_click();
        cta_scroll_left();
        init_popup_slider();
        resize_functions();
        load_more_posts();
        scroll_down();
        single_popup_img();
    });

    function init_home_top_slider () {
        var sliders = $('.block-slider-module');
        if( !sliders.length ) return;

        sliders.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            speed:300,
            adaptiveHeight: true
        });

        var preview = $('.slider-module-arrow-left'),
            next    = $('.slider-module-arrow-right');

        preview.click( function(){ sliders.slick('slickPrev'); });
        next.click( function(){ sliders.slick('slickNext'); });
    }

    function humburger_menu(){
        var burger_menu = $('.top-burger-mobile'),
            nav_menu    = $('.top-navigation-item-menu');

        burger_menu.on('click', function(){
            nav_menu.toggleClass('mobile-active');
            burger_menu.toggleClass('open');
            $('body').toggleClass('disable');
        });
    }

    function cta_scroll_left(){
        $('.scroll-cta').on('scroll ', function(){
            if( $(this).hasClass('scroll-cta') ) $(this).removeClass('scroll-cta')
        } )
    }

    function horisontal_scroll_by_click(){
        const scroll_container          = $('.scroll-left-by-click'),
              scroll_container_links    = $('.scroll-left-by-click a');

        $(function(){
            var curDown         = false,
                curXPos         = 0,
                sliderXPos      = 0,
                isScroll        = false;

            scroll_container.on('mousemove', function( e ){
                if( curDown ){
                    $(this).scrollLeft(sliderXPos + (curXPos - e.pageX));
                    isScroll = true;
                }
            });

            scroll_container.on('mousedown', function(e){
                e.preventDefault()
                sliderXPos  = $(this).scrollLeft();
                curXPos     = e.pageX;
                curDown     = true;
                isScroll    = false;
            });

            $(window).on('mouseup', function(e){
                scroll_container_links.on('click', function(e){
                    return isScroll ? false: true;
                } )
                curDown = false;
            });
        })
    }

    function init_popup_slider(){
        var sliders_parent  = $('.block-popup-slider-module-section'),
            slider          = $('.popup-slider-slick'),
            open_slider     = $('.img-block-our-work'),
            close_slider    = $('.popup-close-button');
        if( !slider.length ) return;

        slider.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            speed: 150,
            adaptiveHeight: true,
            variableWidth: true
        });

        open_slider.on('click ', function(){
            let go_to_slide = $(this).data('index');

            slider.slick('setPosition');
            slider.slick('slickGoTo', go_to_slide);

            setTimeout(function(){
                sliders_parent.toggleClass('is-hide');
                $('body').toggleClass('disable');
                slider.slick('setPosition');
            }, 200);

        });

        close_slider.on('click', function(){
            sliders_parent.toggleClass('is-hide');
            $('body').toggleClass('disable');
        });
    }

    function resize_functions(){
        $(window).on('resize', function(){
        });
    }

    function load_more_posts(){
        var per_page = 2,
            posts_container = $('.insta-posts-container');
        $('.insta-load-more').on('click', function(){
            var _this = $(this);
            $.ajax({
                type: "post",
                dataType: "json",
                url: vars_admin.ajax_url,
                data: {
                    action: 'loadMorePosts',
                    per_page: per_page
                },
                beforeSend: function(){
                    _this.css('visibility', 'hidden' );
                },
                success: function( response ){
                    console.log(response);
                    if( response.disable_load_more ) _this.remove();
                    posts_container.append(response.data);
                    _this.css('visibility', 'visible' );
                    per_page++;
                },
                error: function(){
                    alert('error');
                }
            });
        });
        }

    function single_popup_img(){
        var image_par   = $('.popup-image-click');
        var image       = $('.popup-image-click img');
        var close       = $('.insta-single-container .popup-close-button');

        close.on('click', function(){
            toggle_popup();
        });

        image.on('click', function(){
            if( !image_par.hasClass('popup-image-click-active') ){
                toggle_popup();
            }
        });

        function toggle_popup(){
            $('body').toggleClass('disable');
            image_par.toggleClass('popup-image-click-active');
        }
    }

    function scroll_down(){
        var button      = $('.button-scroll');
        var scroll_to   = $('.contact-section');

        button.on('click', function(){
            $([document.documentElement, document.body]).animate({ scrollTop: scroll_to.offset().top }, 100);
        });

    }

});