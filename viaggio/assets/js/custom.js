(function($) { 
"use strict"; // Author code here 
    // this executes immediately - before the page is finished loading
    $(".search_top").on('click' , function(){
        $('.top_search').slideDown('fast');
    });
    $('#search_close').on('click', function(){
        $('.top_search').slideUp('fast');
    });

    var menu_item = $

    $("#mainmenu").slicknav({
        brand : $('.brand_container .brand_container').html(),
        label : '',
        closedSymbol : '<i class="fa fa-angle-double-right"></i>',
        openedSymbol : '<i class="fa fa-angle-double-down"></i>'
    });

    var boxWidth = $("#offcanvas_menu_container").width();
        $("#canvas_colse").click(function(){
            $("#offcanvas_menu_container").animate({
                width: 0,

            });
        });
        $("#toggle-off-canvas").click(function(){
            $("#offcanvas_menu_container").animate({
                width: boxWidth,
                right : 0,
            });
        });

    $('#menu').sticky({topSpacing:0});


    $('.map-canvas').each(function(){
        map = new google.maps.Map(this, {
          center: {lat: $(this).data('lat'), lng: $(this).data('lng')},
          zoom: 12
        });

        var marker = new google.maps.Marker({
            position: {lat: $(this).data('lat'), lng: $(this).data('lng')},
            map: map,
            title: 'Hello World!',
            icon : $(this).data('icon')
          });

    });

    jQuery(window).load(function() {
            new WOW().init();

        ////////////////////////////////
        //  Nivo Slider
        /////////////////////////////////

        $('#slider').nivoSlider({
            prevText: '<i class="fa fa-angle-left slider_arrow"></i>',
            nextText: '<i class="fa fa-angle-right slider_arrow"></i>',
            controlNav: true,
            pauseTime: 50000,
        });

        ////////////////////////////////
        //  Nivo Slider
        /////////////////////////////////
        
        $('.s-thumb-carousel').nivoSlider({
            prevText: '<i class="fa fa-angle-left slider_arrow"></i>',
            nextText: '<i class="fa fa-angle-right slider_arrow"></i>',
            controlNav: false,
            pauseTime: 50000,
        });

        ////////////////////////////////
        //  Nivo Slider
        /////////////////////////////////

        $('.instagram-entry ul').jflickrfeed({
            limit: 6,
            qstrings: {
                id: $('.instagram-entry').data('flickr')
            },
            itemTemplate: 
            '<li>' +
                '<a href="{{image_b}}"><img src="{{image_s}}" alt="{{title}}" /></a>' +
            '</li>'
        });

    });
})(jQuery);

