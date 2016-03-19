jQuery(function($) {
	"use strict";
	// Author Code Here


    $(document).ready(function(){
        var map = $('#wpgmza_map');
        map.width($(window).width());
        map.addClass('google_map');
    });

    $(window).load(function(){
        SetupPosts();
        $('body').css('opacity', '1');
        $('.nav-spacer').height($('nav.top-nav').outerHeight());

        if($(window).width() < 768) {
            $('.header-menu-container').width($(window).width() - 10);
        }

        var map = $('#wpgmza_map');
        if(map.parent().hasClass('map_holder') && map != null) {
            map.width($(window).width());
            map.parent().css('left', -map.offset().left + 'px');
            map.css('left', -map.offset().left + 'px');
            google.maps.event.trigger(map, 'resize');
        }

        $('.portfolio-item-holder .overlay').each(function(){
            $(this).height($(this).parent().height());
        });

        var pfContainer = $('#portfolio-container').isotope({
            itemSelector: '.portfolio-item-holder',
            layoutMode: 'masonry'
        });
        pfContainer.imagesLoaded().progress( function() {
          pfContainer.isotope('masonry');
        });

        $('.gallery .gallery-item a').each(function(){
            var gallery = $(this).parents(".gallery");
            $(this).attr('data-lightbox', gallery.attr('id'));
            var galleryItem = $(this).parents(".gallery-item");
            $(this).attr('data-title', galleryItem.find('.wp-caption-text').html());
        }); 

        $('a[rel^="attachment"]').each(function(){
            if($(this).find('img').length > 0) {
                $(this).attr('data-lightbox', $(this).attr('rel').replace('attachment ', ''));
                $(this).attr('data-title', $(this).next('.wp-caption-text').html());
            }
        });

        lightbox.option({
            'fitImagesInViewport': true,
            'positionFromTop': 0
        });

        $('.sidebar .widget ul > li > a').each(function(){
            if($(this).parent().find("ul.sub-menu").length > 0) {
                $(this).append("<i class='arrow_carrot-down'></i>");
            }
        });

        $('.sidebar .widget ul > li > a').click(function(event){
            if($(this).parent().find("ul.sub-menu").length > 0) {
                event.preventDefault();
                $(this).parent().find("ul.sub-menu").toggle();
            }
        });


    });

    $(window).resize(function(){
        if($(window).width() < 768) {
            $('.header-menu-container').width($(window).width() - 30);
        }
        $('.portfolio-item-holder .overlay').each(function(){
            $(this).height($(this).parent().height());
        });
        if(map != null) {
            if (map.parent().hasClass('map_holder')) {
                map.parent().width($(window).width());
                map.css('left', -map.offset().left + 'px');
                google.maps.event.trigger(map, 'resize');
            }
        }
    });

    function SetupPosts() {
        $('.format-video .post-header iframe').each(function(){
                var width = $(this).width();
                var aspectRatio = $(this).attr('data-aspect-ratio');
                var arr = aspectRatio.split(':');
                var temp1 = width / arr[0];
                $(this).height(temp1 * arr[1]);
        });
        $('.gallery-post-slider').each(function(){
            if(!($(this).hasClass('owl-carousel'))) {
                $(this).owlCarousel({
                    singleItem: true
                });
            }
        });
        $('.google-map').each(function(){
            $(this).height($(this).attr('data-height'));
        });
    }
    $(window).scroll(function(){
        if($(window).scrollTop() > 200) {
            $('a.back-to-top').css('display', 'block');
            setTimeout(function(){
                $('a.back-to-top').addClass('active');
            },1);
            $('nav.top-nav.nav-fixed').addClass('scrolled');
        } else {
            $('a.back-to-top').fadeOut(300, function(){
                $('a.back-to-top').removeClass('active');
            });
            $('nav.top-nav.nav-fixed').removeClass('scrolled');
        }
    });

    $('a.back-to-top').click(function(event){
        event.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 500);
    });

    $('a.sidebar-toggle').click(function(event){
        event.preventDefault();
        $('.sidebar.main-sidebar').addClass('menuOpen');
    });

    $('a.close-menu').click(function(event){
        event.preventDefault();
        $('.sidebar.main-sidebar').removeClass('menuOpen');
    });

    $('.search-toggle').click(function(event){
        event.preventDefault();
        var form = $(this).prev('form');
        var input = $(this).find("#s");
        if(form.hasClass('active') && input.val().trim() != "") {
            form.submit();
        } else {
            $(this).addClass('active');
            form.addClass('active');
            form.find('input#s').focus();
        }
    });

    $('.close-search').click(function(event){
        event.preventDefault();
        var form = $(this).parent('form');
        var search_button = form.next('.search-toggle');
        if(form.hasClass('active')) {
            form.removeClass('active');
            search_button.removeClass('active');
        }
    });

    $('.searchform input#s').blur(function(){
        // var input = $(this);
        // input.parent().removeClass('active');
        // input.parent().next().removeClass('active');
    });

    $('body').on('click', '.format-gallery .post-header .navigation a', function(event){
        event.preventDefault();
        var next = $(this).hasClass('owl-next');
        var currentOwl = $(this).parent().parent().find('.gallery-post-slider').data('owlCarousel');
        if(next)
            currentOwl.next();
        else
            currentOwl.prev();
    });


    $('.load-more-ajax').click(function(event){
        event.preventDefault();
        var link = $(this);
        link.find('.wait_icon').show();
        jQuery.ajax({
            type:"POST",
            url: link.attr('data-url'), // our PHP handler file
            data: {action:"load_posts", offset: link.attr('data-current')},
            success:function(results){
                if(results != 'noposts') {
                    $('.post-list .post').last().after(results);
                    SetupPosts();
                } else {
                    link.removeAttr('href');
                    link.html('No More Posts.')
                    link.addClass('done');
                }
                link.find('.wait_icon').hide();
            }
        });
        $(this).attr('data-current', parseInt($(this).attr('data-current')) + parseInt($(this).attr('data-offset')));
    });

    $('.expand-top-menu').click(function(event){
            event.preventDefault();
            var isVisible = $('.header-menu-container').is(':visible');
            if(!isVisible) { // Hidden
                $('.header-menu-container').css('display', 'block');
                $(this).addClass('active');
                setTimeout(function(){
                    $('.header-menu-container').addClass('active');
                }, 1);
            } else { // Visible
                $('.header-menu-container').removeClass('active');
                $(this).removeClass('active');
                setTimeout(function(){
                    $('.header-menu-container').css('display', 'none');
                }, 500);
            }
        });

    $('.bottom-overlay').height($(window).height());

    new WOW().init();
});
