$(function() {
    /*-------------------------------------Header Fixed-------------------------*/
    "use strict";
    $(function () {
        var header = $(".start-style");
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 10) {
                header.removeClass('start-style').addClass("scroll-on");
            } else {
                header.removeClass("scroll-on").addClass('start-style');
            }
        });

        // dashboard left menu
        var dashboardLeft = $(".dasb_menu");
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 10) {
                dashboardLeft.removeClass('dasb_menu').addClass("dasb-top");
            } else {
                dashboardLeft.removeClass("dasb-top").addClass('dasb_menu');
            }
        });
    });

    /*-------------------------------------Mobile Menu-------------------------*/
    var ico = $('<span></span>');
    $('li.sub_menu_open').append(ico);

    $("#menu_res").click(function() {
        $("#res_nav").toggleClass('left0');
    });

    $('li span').on("click", function(e) {
        if ($(this).hasClass('open')) {

            $(this).prev('ul').slideUp(300, function() {});

        } else {
            $(this).prev('ul').slideDown(300, function() {});
        }
        $(this).toggleClass("open");
    });
    $('#menu_res').click(function() {
        $(this).toggleClass('menu_responsiveTo')
    });



    /*-------------------------------------ScrollTop-------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('.scrollup').fadeIn();
            $('.arrow-show').fadeIn();
        } else {
            $('.scrollup').fadeOut();
            $('.arrow-show').fadeOut();
        }
    });
    $('.scrollup').click(function(e) {
        e.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, 300);
        return false;
    });


    /*-------------------------------------custome popup-------------------------*/

    $(document).on('click', '.pup_btn', function(){
        $(".pop_wrap").addClass("pop_open");
        e.stopPropagation()
    });
    $(document).on('click', function(e){
        var container =$(".pop_red");
        if (!container.is(e.target) && container.has(e.target).length === 0) { 
            $(".pop_wrap").removeClass("pop_open");
        }
        e.stopPropagation()
    });

    
 /*-------------------------------------User Admin left menu Sub_Menu-------------------------*/
 $(document).ready(function(){
    $(".sub_menu>a").click(function(){
        $(this).closest(".sub_menu").find(".submenu-list").slideToggle();
    });
 });

 /*-------------------------------------User Admin left menu Responsive-------------------------*/
 $(document).on('click', '.menu_btn', function(){
    $(".lft_wrap").toggleClass('open-das');
    $(".details_sec").toggleClass('z_index');
});
$(document).on('click', '.cls_menu', function(){
    $(".lft_wrap").removeClass('open-das');
    $(".details_sec").removeClass('z_index');
});
    

});