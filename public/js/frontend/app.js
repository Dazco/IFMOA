function tabNext(tab){
    $(tab).click();
    $('html, body').animate({ scrollTop: 300 }, 'slow');
}
function removeQual(input) {
    input.parent().parent().prev().children('td:last-child').html('<a class="btn btn-danger text-white remove" onclick="removeQual($(this))">Remove</a>')
    input.parent().parent().remove();
    acadCounter--;
}

function removeEmp(input) {
    input.parent().parent().prev().children('td:last-child').html('<a class="btn btn-danger text-white remove" onclick="removeEmp($(this))">Remove</a>')
    input.parent().parent().remove();
    empCounter--;
}

function readURL(input,img) {
    var fileTypes = ['jpg', 'jpeg', 'png'];  //acceptable file types
    if (input.files && input.files[0]) {
        var extension = input.files[0].name.split('.').pop().toLowerCase(); //file extension from input file
        if(fileTypes.indexOf(extension) > -1)
        {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(img)
                    .attr('src', e.target.result)
                // .width(350)
                // .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }else{
            alert("Invalid photo")
        }
    }
}

function revertURL(img,src) {
    $(img).attr('src', src)
}

(function($) {
    "use strict";

    /*--------------------------
    preloader
    ---------------------------- */
    $(window).on('load', function() {
        var pre_loader = $('#preloader');
        pre_loader.fadeOut('slow', function() {
            $(this).remove();
        });
    });
    /*---------------------
     TOP Menu Stick
    --------------------- */
    var s = $(".sticker");
    var pos = s.position();
    $(window).on('scroll', function() {
        var windowpos = $(window).scrollTop() > 500;
        if (windowpos > pos.top) {
            s.addClass("stick");
        } else {
            s.removeClass("stick");
        }
    });

    /*----------------------------
     Navbar nav
    ------------------------------ */
    var main_menu = $(".main-menu ul.navbar-nav li ");
    main_menu.on('click', function() {
        main_menu.removeClass("active");
        $(this).addClass("active");
    });

    /*----------------------------
     wow js active
    ------------------------------ */
    new WOW().init();

    $(".navbar-collapse a").on('click', function() {
        $(".navbar-collapse.collapse").removeClass('in');
    });

    //---------------------------------------------
    //Nivo slider
    //---------------------------------------------
    if(document.getElementById('ensign-nivoslider')){
        $('#ensign-nivoslider').nivoSlider({
            effect: 'random',
            slices: 15,
            boxCols: 8,
            boxRows: 8,
            animSpeed: 500,
            pauseTime: 5000,
            startSlide: 0,
            directionNav: true,
            controlNavThumbs: false,
            pauseOnHover: true,
            manualAdvance: false,
        });
    }

    /*---------------------
      Venobox
    --------------------- */
    if($('.venobox').length > 0) {
        var veno_box = $('.venobox');
        veno_box.venobox();
    }

    /*----------------------------

    /*--------------------------
      Back to top button
    ---------------------------- */
    var back_to_top = $('.back-to-top')
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            back_to_top.fadeIn('slow');
        } else {
            back_to_top.fadeOut('slow');
        }
    });

    back_to_top.click(function(){
        $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
        return false;
    });


    /*--------------------------
     collapse
    ---------------------------- */
    var panel_test = $('.panel-heading a');
    panel_test.on('click', function() {
        panel_test.removeClass('active');
        $(this).addClass('active');
    });

    /*---------------------

     isotope active
    ------------------------------ */
    // portfolio start
    if($('.awesome-project-content').length > 0) {
        $(window).on("load", function () {
            var $container = $('.awesome-project-content');
            $container.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            var pro_menu = $('.project-menu li a');
            pro_menu.on("click", function () {
                var pro_menu_active = $('.project-menu li a.active');
                pro_menu_active.removeClass('active');
                $(this).addClass('active');
                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });
                return false;
            });

        });
        //portfolio end
    }


    // Stick the header at top on scroll
    $("#header").sticky({
        topSpacing: 0,
        zIndex: '50'
    });

    // Initiate the wowjs animation library
    new WOW().init();


    // Mobile Navigation
    if ($('#nav-menu-container').length) {
        var $mobile_nav = $('#nav-menu-container').clone().prop({
            id: 'mobile-nav'
        });
        $mobile_nav.find('> ul').attr({
            'class': '',
            'id': ''
        });
        $('body').append($mobile_nav);
        $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars text-danger"></i></button>');
        $('body').append('<div id="mobile-body-overly"></div>');
        $('#mobile-nav').find('.menu-has-children').prepend('<i class="fa fa-chevron-down"></i>');

        $(document).on('click', '.menu-has-children i', function (e) {
            $(this).next().toggleClass('menu-item-active');
            $(this).nextAll('ul').eq(0).slideToggle();
            $(this).toggleClass("fa-chevron-up fa-chevron-down");
        });

        $(document).on('click', '#mobile-nav-toggle', function (e) {
            $('body').toggleClass('mobile-nav-active');
            $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
            $('#mobile-body-overly').toggle();
        });

        $(document).click(function (e) {
            var container = $("#mobile-nav, #mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
                    $('#mobile-body-overly').fadeOut();
                }
            }
        });
    } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
        $("#mobile-nav, #mobile-nav-toggle").hide();
    }

    // Porfolio - uses the magnific popup jQuery plugin
    if($('.portfolio-popup').length > 0) {
        $('.portfolio-popup').magnificPopup({
            type: 'image',
            removalDelay: 300,
            mainClass: 'mfp-fade',
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
                opener: function (openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
    }
})(jQuery);
