$(document).ready(function(){$(".animate-redirect a[href^='#']").click(function(t){t.preventDefault(),t=$($(this).attr("href")).offset().top,$("body, html").animate({scrollTop:t},1e3)}),$(".countup").counterUp({delay:50,time:2e3}),$("body").on("cut copy",function(t){t.preventDefault()})});

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
       //return false;
//    }
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

   