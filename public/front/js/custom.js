$(".testimonial-style3").owlCarousel({loop:!1,responsiveClass:!0,nav:!1,dots:!0,margin:0,smartSpeed:900,responsive:{0:{items:1},600:{items:1},1e3:{items:1}}}),$(".carousel-style3 .owl-carousel").owlCarousel({loop:!0,dots:!1,nav:!1,autoplay:!0,smartSpeed:900,autoplayTimeout:5e3,responsiveClass:!0,autoplayHoverPause:!1,responsive:{0:{items:1,margin:0},768:{items:2,margin:20},992:{items:2,margin:30},1200:{items:3,margin:30}}}),$("#clients").owlCarousel({loop:!0,nav:!1,dots:!1,autoplay:!0,autoplayTimeout:3e3,responsiveClass:!0,autoplayHoverPause:!1,smartSpeed:900,responsive:{0:{items:2,margin:20},768:{items:3,margin:40},992:{items:4,margin:60},1200:{items:5,margin:80}}}),$(".slider-fade").owlCarousel({items:1,loop:!0,margin:0,autoplay:!0,smartSpeed:500,mouseDrag:!1,animateIn:"fadeIn",animateOut:"fadeOut"}),$(".services-grids").owlCarousel({loop:!0,nav:!1,responsiveClass:!0,dots:!1,autoplay:!0,smartSpeed:900,mouseDrag:!1,responsive:{0:{items:1,margin:15,mouseDrag:!0},768:{items:2,margin:20,mouseDrag:!0},1200:{items:3,margin:25,mouseDrag:!1}}}),$(".owl-carousel").owlCarousel({items:1,loop:!0,dots:!1,margin:0,autoplay:!0,smartSpeed:500}),$(".animate-redirect a[href^='#']").click(function(e){e.preventDefault(),e=$($(this).attr("href")).offset().top,$("body, html").animate({scrollTop:e},1e3)}),$(".countup").counterUp({delay:50,time:2e3}),$("body").on("cut copy",function(e){e.preventDefault()}),$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}});

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

$("body").on("submit",".ajaxformfileupload", function(event){
    event.preventDefault();
    // if($(this).parsley().isValid() ) {
        // alert(11);
        var formdata   = $(this);
       var dataValue  = new FormData(this);//new FormData(formdata[0]);
       var UrlValue   = $(this).attr('action');

       var ButtonText = $(this).find('button[type="submit"]').html();
       /*$(this).find('button').prop('disabled', true);
       $(this).find('button').html('Loading ...');*/
       
       $(this).find('button[type="submit"]').prop('disabled', true);
       $(this).find('button[type="submit"]').html('Loading ...');

       //alert(dataValue);
       $.ajax({
           url     : UrlValue,
           method  : 'post',
           data    :dataValue,
           headers:
           {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           processData: false,
           contentType: false,
           beforeSend: function( xhr ) {
               
           },
           success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    window.location.href = "/thankyou/" + data.id;
                } else {
                    printErrorMsg(data.error);
                }
            },
           error: function(data) {
               console.log("error ",data);
               printErrorMsg(data.error);
               console.log(ButtonText);
               formdata.find('button[type="submit"]').prop('disabled', false);
               formdata.find('button[type="submit"]').html(ButtonText);
           }
       });
});

$("body").on("submit",".contactform", function(event){
    event.preventDefault();
    // if($(this).parsley().isValid() ) {
        // alert(11);
        var formdata   = $(this);
       var dataValue  = new FormData(this);//new FormData(formdata[0]);
       var UrlValue   = $(this).attr('action');

       var ButtonText = $(this).find('button[type="submit"]').html();
       /*$(this).find('button').prop('disabled', true);
       $(this).find('button').html('Loading ...');*/
       
       $(this).find('button[type="submit"]').prop('disabled', true);
       $(this).find('button[type="submit"]').html('Loading ...');

       //alert(dataValue);
       $.ajax({
           url     : UrlValue,
           method  : 'post',
           data    :dataValue,
           headers:
           {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           processData: false,
           contentType: false,
           beforeSend: function( xhr ) {
               
           },
           success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    location.reload();
                } else {
                    printErrorMsg(data.error);
                }
            },
           error: function(data) {
               console.log("error ",data);
               printErrorMsg(data.error);
               console.log(ButtonText);
               formdata.find('button[type="submit"]').prop('disabled', false);
               formdata.find('button[type="submit"]').html(ButtonText);
           }
       });
    });

    function printErrorMsg(msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display', 'block');
        $.each(msg, function(key, value) {
            $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
        });
    }

   